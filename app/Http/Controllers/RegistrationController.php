<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterByGEWISIdRequest;
use App\Http\Requests\RegisterExternalRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Sqlr\GEWIS\Exceptions\InvalidKey;
use Sqlr\GEWIS\Exceptions\ServiceUnavailable;
use Sqlr\GEWIS\GEWIS;

class RegistrationController extends Controller
{
    public function index()
    {
        if (app()->environment() !== 'local') {
            return view('registration.closed');
        }

        return view('registration.index');
    }

    /**
     * User registers via their GEWIS credentials.
     *
     * @param Request $request
     * @param GEWIS $gewis
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerByGEWISId(Request $request, GEWIS $gewis)
    {
        $member = null;

        try {
            /** @var RegisterByGEWISIdRequest $request */
            $request = app(RegisterByGEWISIdRequest::class);

            $member = $gewis->findMemberById($request->gewis_id);
        } catch (InvalidKey|ServiceUnavailable $e) {
            Log::critical('GEWIS API unavailable', [
                'gewis_id' => $request->get('gewis_id'),
            ]);

            session()->flash('alert-danger', [
                'title' => '500 - Ojee...',
                'message' => [
                    'De verbinding naar GEWIS is niet beschikbaar. Probeer het nog eens!',
                    'Blijft het probleem aanhouden? Schrijf je dan in als externe, dan kan de koppeling later alsnog worden gelegd.',
                ],
            ]);
        }

        if (is_null($member)) {
            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['gewis_id' => trans('validation.exists', ['attribute' => 'gewis id'])]);
        }

        if (User::where('email', $member->email)->exists()) {
            session()->flash('alert-warning', [
                'title' => 'Dubbele registratie',
                'message' => sprintf(
                    'Het e-mailadres van GEWIS-lid %d is al geregistreerd, maar zonder koppeling met GEWIS.',
                    $request->gewis_id
                ),
            ]);

            return redirect()
                ->back()
                ->withInput($request->all())
                ->withErrors(['gewis_id' => trans('validation.unique', ['attribute' => 'gewis id'])]);
        }

        return $this->successfulRequest([
            'gewis_id' => $member->lidnr,
            'name' => $member->initials . ' ' . $member->lastName,
            'email' => $member->email,
        ]);
    }

    /**
     * User registers via a regular form.
     *
     * @param RegisterExternalRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerByEmail(RegisterExternalRequest $request)
    {
        return $this->successfulRequest($request->except([
            'gewis_id',
        ]));
    }

    /**
     * Handle a successful registration.
     *
     * @param array $data
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function successfulRequest(array $data)
    {
        $user = User::create(array_merge([
            'locale' => session()->get('locale'),
            'password' => Hash::make(str_random(128)),
        ], $data));

        // TODO Think of whether firing an event-listener combination for this would be more logical.
//        dispatch(new SendInterestedUserRegisteredMail(
//            $user->id
//        ));

        Log::notice('Interested user registered', [
            'user_id' => $user->id,
            'gewis_id' => $user->gewis_id,
            'name' => $user->name,
        ]);

        session()->flash('alert-success', [
            'title' => 'Bedankt voor je aanmelding!',
            'message' => [
                'We hebben je een e-mail gestuurd ter bevestiging. Ook kan je daarmee toegang krijgen tot een account op deze website voor nog meer gave features!',
                'Heb je de e-mail niet ontvangen? Neem dan contact met ons op, dan kunnen we controleren of je gegevens kloppen.',
            ],
        ]);

        return redirect()->route('register');
    }
}
