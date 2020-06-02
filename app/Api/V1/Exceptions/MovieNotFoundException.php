<?php

namespace App\Api\V1\Exceptions;

class MovieNotFoundException extends HttpException {
    const ERROR_MESSAGE = "Movie does not exists";

    public function __construct() {
        parent::__construct(self::ERROR_MESSAGE, self::ERROR_CODE_MOVIE_NOT_FOUND);
    }
}
