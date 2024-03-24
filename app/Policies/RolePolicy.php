<?php

namespace App\Policies;

use App\Models\User;

class RolePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function isAdmin(User $user)
    {
        return $user->isAdmin();
    }

    public function isClient(User $user)
    {
        return $user->isClient();
    }
}
