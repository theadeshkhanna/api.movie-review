<?php

namespace App\Api\V1\Requests;

use App\Services\Contracts\MovieDetailContract;

class MovieDetailRequest extends BaseRequest implements MovieDetailContract {
    const NAME = 'name';

    public function rules() {
        return [
            'name' => 'required|string'
        ];
    }

    public function getMovieName() {
        return $this->get(self::NAME);
    }
}
