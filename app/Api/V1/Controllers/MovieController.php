<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\MovieDetailRequest;
use App\Services\MovieService;
use Illuminate\Support\Facades\Auth;

class MovieController extends BaseController {

    protected $movieService;

    public function __construct() {
        $this->movieService = new MovieService();
    }

    public function getMovieDetails(MovieDetailRequest $request) {
        return $this->movieService->fetchDetails($request, Auth::id());
    }
}
