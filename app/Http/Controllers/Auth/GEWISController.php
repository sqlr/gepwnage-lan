<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Sqlr\GEWIS\Exceptions\InvalidKey;
use Sqlr\GEWIS\Exceptions\ServiceUnavailable;
use Sqlr\GEWIS\GEWIS;
use Sqlr\GEWIS\Model\Member;

class GEWISController extends Controller
{
    /** @var GEWIS */
    protected $gewis;

    /**
     * Create a new controller instance.
     *
     * @param GEWIS $gewis
     */
    public function __construct(GEWIS $gewis)
    {
        $this->gewis = $gewis;

        $this->middleware('guest');
    }

    /**
     * Redirect users to GEWIS
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login()
    {
        return redirect()->away(sprintf(
            '%s/token/%s',
            rtrim(config('services.gewis.url'), '/'),
            config('services.gewis.id')
        ));
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function callback(Request $request)
    {
        $payload = JWT::decode(
            $request->get('token'),
            config('services.gewis.secret'),
            ['HS256']
        );

        // Log in existing users directly.
        $user = User::select()
            ->where('gewis_id', '=', $payload->lidnr)
            ->first();
        if ($user) {
            auth()->guard()->login($user);
            return redirect()->route('orders');
        }

        // Try to get user metadata.
        $member = $this->getGEWISMember($payload->lidnr);
        if (is_null($member)) {
            return redirect()->route('register');
        }

        // See if user exists but without GEWIS coupling
        if (User::where('email', $member->email)->exists()) {
            session()->flash('alert-warning', [
                'title' => 'Double registration',
                'message' => sprintf(
                    'The e-mail address %s for GEWIS member %d is already registered in our system.',
                    $member->email,
                    $member->lidnr
                ),
            ]);
            return redirect()->route('register');
        }

        // Create new user for GEWIS member
        $user = $this->createUser($member);
        auth()->guard()->login($user);

        session()->flash('alert-success', [
            'title' => 'Account created.',
            'message' => [
                'We have created an account for you in our system. Welcome!',
            ],
        ]);

        return redirect()->route('tickets');
    }

    /**
     * @param int $gewis_id
     * @return null|Member
     */
    protected function getGEWISMember(int $gewis_id): ?Member
    {
        try {
            return $this->gewis->findMemberById($gewis_id);
        } catch (InvalidKey|ServiceUnavailable $e) {
            Log::critical('GEWIS API unavailable', [
                'gewis_id' => $gewis_id,
            ]);

            session()->flash('alert-danger', [
                'title' => '500 - Oh my ...',
                'message' => [
                    'A connection to GEWIS could not be established.',
                    'If the problem is recurring, try creating an account differently.',
                ],
            ]);
        }

        return null;
    }

    /**
     * @param Member $member
     * @return User
     */
    protected function createUser(Member $member): User
    {
        $user = new User([
            'gewis_id' => $member->lidnr,
            'name' => $member->initials . ' ' . $member->lastName,
            'email' => $member->email,
            'password' => Hash::make(str_random(128)),
        ]);

        $user->groups()->attach('gewis');

        Log::notice('User registered', [
            'user_id' => $user->id,
            'gewis_id' => $user->gewis_id,
            'name' => $user->name,
        ]);

        return $user;
    }
}
