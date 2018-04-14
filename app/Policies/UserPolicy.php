<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * @param User $user
     * @param User $target
     * @return mixed
     */
    public function view(User $user, User $target)
    {
        return $user->is($target);
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
     * @param User $user
     * @param User $target
     * @return mixed
     */
    public function update(User $user, User $target)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the ticket.
     *
     * @param User $user
     * @param User $target
     * @return mixed
     */
    public function delete(User $user, User $target)
    {
        return false;
    }
}
