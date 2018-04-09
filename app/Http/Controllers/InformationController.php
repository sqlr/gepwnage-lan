<?php

namespace App\Http\Controllers;

class InformationController extends Controller
{
    public function location()
    {
        return view('information.location');
    }

    public function pricing()
    {
        return view('information.pricing');
    }

    public function schedule()
    {
        return view('information.schedule');
    }
}
