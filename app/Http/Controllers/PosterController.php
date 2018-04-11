<?php

namespace App\Http\Controllers;

class PosterController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('poster');
    }
}
