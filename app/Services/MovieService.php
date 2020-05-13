<?php

namespace App\Services;

use App\Services\Contracts\MovieDetailContract;
use Curl\Curl;
use Illuminate\Support\Facades\Config;

class MovieService {

    public function fetchDetails(MovieDetailContract $contract) {
        $api_key = Config::get('services.omdb.key');

        $url = 'http://www.omdbapi.com/?t=' . $contract->getMovieName() . '&apiKey=' . $api_key;
        $curl = new Curl();
        $curl->post($url);
        return $curl->response;
    }
}
