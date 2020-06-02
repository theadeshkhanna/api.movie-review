<?php

namespace App\Services;

use App\Api\V1\Exceptions\MovieNotFoundException;
use App\Services\Contracts\MovieDetailContract;
use Curl\Curl;
use Illuminate\Support\Facades\Config;

class MovieService {

    public function fetchDetails(MovieDetailContract $contract) {
        try {
            $api_key = Config::get('services.omdb.key');

            $url = 'http://www.omdbapi.com/?t=' . $contract->getMovieName() . '&apiKey=' . $api_key;
            $curl = new Curl();
            $curl->post($url);
            if (json_decode($curl->response)->Response === 'True') {
                return $curl->response;
            } else {
                throw new MovieNotFoundException();
            }
        } catch (\Exception $e) {
            throw new MovieNotFoundException();
        }
    }
}
