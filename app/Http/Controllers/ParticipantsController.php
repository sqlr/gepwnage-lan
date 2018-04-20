<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Validation\UnauthorizedException;

class ParticipantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user() || !auth()->user()->groups->contains('gewis')) {
            throw new UnauthorizedException;
        }

        return view('participants', [
            'orders' => Order::all(),
        ]);
    }
}
