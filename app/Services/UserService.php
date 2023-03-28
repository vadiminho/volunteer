<?php

namespace App\Services;

use App\Models\User;

class UserService
{

    public function createRecord(array $data)
    {
        return $user = User::create($data);
    }
}