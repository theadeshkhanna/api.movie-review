<?php

namespace App\Api\V1\Transformers\Traits;

use App\User;

trait UserDetailTrait {
    public function getAttributes(User $user) {
        return [
           'name' => $user->name,
           'email' => $user->email
        ];
    }
}
