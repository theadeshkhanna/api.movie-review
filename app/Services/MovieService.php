<?php

namespace App\Services;

use App\Api\V1\Exceptions\MovieNotFoundException;
use App\Bookmark;
use App\Services\Contracts\MovieDetailContract;
use Curl\Curl;
use Illuminate\Support\Facades\Config;

class MovieService {

    public function fetchDetails(MovieDetailContract $contract, $user_id) {
        try {
            $api_key = Config::get('services.omdb.key');

            $url = 'http://www.omdbapi.com/?t=' . $contract->getMovieName() . '&apiKey=' . $api_key;
            $curl = new Curl();
            $curl->post($url);
            $response = json_decode($curl->response);
            if ($response->Response === 'True') {

                $bookmarked = Bookmark::query()
                    ->where('user_id', '=', $user_id)
                    ->where('imdb_id', '=', $response->imdbID)->exists();

                return [
                    'response' => $response,
                    'bookmarked' => $bookmarked
                ];

            } else {
                throw new MovieNotFoundException();
            }
        } catch (\Exception $e) {
            throw new MovieNotFoundException();
        }
    }
}
