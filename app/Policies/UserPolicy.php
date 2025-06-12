<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function delete(User $user, User $model)
    {
        return $user->email == "ahmedalfy657@gmail.com";
    }
}
