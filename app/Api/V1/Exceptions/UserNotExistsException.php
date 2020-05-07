<?php

namespace App\Api\V1\Exceptions;

class UserNotExistsException extends HttpException {
    const ERROR_MESSAGE = "User does not exists";

    public function __construct() {
        parent::__construct(self::ERROR_MESSAGE, self::ERROR_CODE_USER_NOT_EXISTS);
    }
}
