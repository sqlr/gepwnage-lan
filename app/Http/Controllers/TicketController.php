<?php

namespace App\Http\Controllers;

use App\Order;
use App\Ticket;
use App\User;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;

class TicketController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws AuthenticationException
     */
    public function index()
    {
        $opens = new Carbon('2018-04-20 17:30:00', new \DateTimeZone('Europe/Amsterdam'));
        if (now() < $opens && (!auth()->check() || !auth()->user()->groups->contains('gepwnage'))) {
            return view('tickets.closed', [
                'opens' => $opens,
            ]);
        }

        if (!auth()->check()) {
            throw new AuthenticationException;
        }

        return view('tickets.index', [
            'tickets' => Ticket::all(),
            'order' => auth()->user()->order,
        ]);
    }

    /**
     * @param Ticket $ticket
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Ticket $ticket)
    {
        $this->authorize('view', $ticket);

        return view('tickets.show', [
            'ticket' => $ticket,
        ]);
    }

    /**
     * @param  Ticket $ticket
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function buy(Ticket $ticket)
    {
        $this->authorize('buy', $ticket);

        /** @var User $user */
        $user = auth()->user();

        /** @var Order $order */
        $order = $user->order()->make();
        $order->ticket()->associate($ticket);

        $order->price = $ticket->price;

        $order->save();

        if ($ticket->stock !== null && $ticket->stock > 0) {
            $ticket->decrement('stock');
        }

        session()->flash('alert-success', [
            'title' => 'Ticket bought.',
            'message' => [
                'Congratulations, you have bought a ticket!',
            ],
        ]);

        return redirect()->route('orders.show', $order);
    }
}
