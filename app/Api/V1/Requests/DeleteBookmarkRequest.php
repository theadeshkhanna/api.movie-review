<?php

namespace App\Api\V1\Requests;

use App\Services\Contracts\DeleteBookmarkContract;

class DeleteBookmarkRequest extends BaseRequest implements DeleteBookmarkContract {
    const IMDB_ID = 'imdb_id';

    public function rules() {
        return [
           self::IMDB_ID => 'required|exists:bookmarks,imdb_id'
        ];
    }

    public function getImdbId() {
        return $this->get(self::IMDB_ID);
    }
}
