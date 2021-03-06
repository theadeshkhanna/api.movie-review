<?php

namespace App\Api\V1\Exceptions;

class HttpException extends \Symfony\Component\HttpKernel\Exception\HttpException {

    const ERROR_CODE_USER_NOT_EXISTS = 1;
    const ERROR_CODE_INVALID_CREDENTIALS = 2;
    const ERROR_BOOKMARK_ALREADY_EXISTS = 3;
    const ERROR_CODE_MOVIE_NOT_FOUND = 4;

    public function __construct($message, $errorCode, $statusCode = 422) {
        parent::__construct($statusCode, $message, null, array(), $errorCode);
    }
}
