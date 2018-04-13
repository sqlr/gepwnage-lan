<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class TicketController extends Controller
{
    public function index()
    {
        $opens = new Carbon('2018-04-20 17:30:00', new \DateTimeZone('Europe/Amsterdam'));

        if (now() < $opens && app()->environment() !== 'local') {
            return view('tickets.closed', [
                'opens' => $opens,
            ]);
        }

        return view('tickets.index');
    }
}
