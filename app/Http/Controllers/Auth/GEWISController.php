<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;

class GEWISController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
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
            '%stoken/%s',
            str_finish(config('services.gewis.url'), '/'),
            config('services.gewis.id')
        ));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback()
    {
        $user = new User;

        auth()->guard()->login($user);

        return redirect()->route('home');
    }
}
