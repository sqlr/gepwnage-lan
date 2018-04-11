<?php

namespace App\Http\Controllers;

class InformationController extends Controller
{
    public function location()
    {
        return view('information.location', [
            'google_maps_url' =>
                'https://www.google.com/maps/embed/v1/place'
                . '?' . 'q=51.4398097,5.4955999'
                . '&' . 'zoom=14'
                . '&' . 'key=' . config('services.google.key'),
        ]);
    }

    public function packingList()
    {
        return view('information.packing-list');
    }

    public function pricing()
    {
        return view('information.pricing');
    }

    public function schedule()
    {
        return view('information.schedule');
    }

    public function visitors()
    {
        return view('information.visitors');
    }
}
