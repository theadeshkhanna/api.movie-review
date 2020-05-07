<?php

namespace App\Services;

use App\Services\Contracts\SignUpContract;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserService {

    public function createUser(signUpContract $contract) {
        $user = new User();
        $user->name = $contract->getName();
        $user->email = $contract->getEmail();
        $user->password = Hash::make($contract->getPassword());

        $user->save();
        return $user;
    }
}
