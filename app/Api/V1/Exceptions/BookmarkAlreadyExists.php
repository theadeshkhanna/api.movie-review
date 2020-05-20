<?php

namespace App\Api\V1\Exceptions;

class BookmarkAlreadyExists extends HttpException {
    const ERROR_MESSAGE = "Bookmark for this Already Exists";

    public function __construct() {
        parent::__construct(self::ERROR_MESSAGE, self::ERROR_BOOKMARK_ALREADY_EXISTS);
    }
}
