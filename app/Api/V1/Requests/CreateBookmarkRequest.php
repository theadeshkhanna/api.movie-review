<?php

namespace App\Api\V1\Requests;

use App\Services\Contracts\CreateBookmarkContract;

class CreateBookmarkRequest extends BaseRequest implements CreateBookmarkContract {
    const RATING = 'rating';
    const POSTER = 'poster';
    const TITLE = 'title';
    const RUNTIME = 'runtime';
    const IMDB_ID = 'imdb_id';

    public function rules() {
        return [
          self::RATING => 'required',
          self::POSTER => 'required',
          self::TITLE => 'required',
          self::RUNTIME => 'required',
          self::IMDB_ID => 'required'
        ];
    }

    public function getRating() {
        return $this->get(self::RATING);
    }

    public function getTitle() {
        return $this->get(self::TITLE);
    }

    public function getRuntime() {
        return $this->get(self::RUNTIME);
    }

    public function getPoster() {
        return $this->get(self::POSTER);
    }

    public function getImdbID() {
        return $this->get(self::IMDB_ID);
    }
}
