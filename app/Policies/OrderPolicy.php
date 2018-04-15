<?php

namespace App\Policies;

use App\Order;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param string $ability
     * @return bool
     */
    public function before(User $user, string $ability)
    {
        if ($user->roles->contains('admin')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the order.
     *
     * @param  \App\User $user
     * @param  \App\Order $order
     * @return mixed
     */
    public function view(User $user, Order $order)
    {
        if ($user->is($order->user)) {
            return true;
        }

        throw new NotFoundHttpException;
    }

    /**
     * Determine whether the user can create orders.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the order.
     *
     * @param  \App\User $user
     * @param  \App\Order $order
     * @return mixed
     */
    public function update(User $user, Order $order)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the order.
     *
     * @param  \App\User $user
     * @param  \App\Order $order
     * @return mixed
     */
    public function delete(User $user, Order $order)
    {
        return false;
    }
}
