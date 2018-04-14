<?php

namespace App\Policies;

use App\Ticket;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TicketPolicy
{
    use HandlesAuthorization;

    public function before(User $user, string $ability)
    {
        if ($user->roles->contains('admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the ticket.
     *
     * @param  \App\User $user
     * @param  \App\Ticket $ticket
     * @return mixed
     */
    public function view(User $user, Ticket $ticket)
    {
        if ($ticket->groups->isEmpty()) {
            return true;
        }

        return $ticket->groups
            ->intersect($user->groups)
            ->isNotEmpty();
    }

    /**
     * Determine whether the user can view the ticket.
     *
     * @param  \App\User $user
     * @param  \App\Ticket $ticket
     * @return mixed
     */
    public function buy(User $user, Ticket $ticket)
    {
        if ($ticket->sold_out || $user->orders_count > 0) {
            return false;
        }

        $opens = new \Carbon\Carbon('2018-04-20 17:30:00', new \DateTimeZone('Europe/Amsterdam'));
        if (now() < $opens && (!auth()->check() || !auth()->user()->groups->contains('gepwnage'))) {
            return false;
        }

        return $this->view($user, $ticket);
    }

    /**
     * Determine whether the user can create tickets.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the ticket.
     *
     * @param  \App\User $user
     * @param  \App\Ticket $ticket
     * @return mixed
     */
    public function update(User $user, Ticket $ticket)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the ticket.
     *
     * @param  \App\User $user
     * @param  \App\Ticket $ticket
     * @return mixed
     */
    public function delete(User $user, Ticket $ticket)
    {
        return false;
    }
}
