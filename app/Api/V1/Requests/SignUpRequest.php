<?php

namespace App\Api\V1\Requests;

use App\Services\Contracts\SignUpContract;

class SignUpRequest extends BaseRequest implements SignUpContract {

    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';

    public function rules() {
        return [
            'name'    => 'required|string',
            'email'   => 'required|email',
            'password' => 'required'
        ];
    }

    public function getName() {
        return $this->get(self::NAME);
    }

    public function getEmail() {
        return $this->get(self::EMAIL);
    }

    public function getPassword() {
        return $this->get(self::PASSWORD);
    }

}
