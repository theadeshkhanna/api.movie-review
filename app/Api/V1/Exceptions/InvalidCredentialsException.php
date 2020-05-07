<?php

namespace App\Api\V1\Exceptions;

class InvalidCredentialsException extends HttpException {
    const ERROR_MESSAGE = "Either Email is wrong or Password";

    public function __construct() {
        parent::__construct(self::ERROR_MESSAGE, self::ERROR_CODE_INVALID_CREDENTIALS);
    }
}
