<?php

namespace App\Api\V1\Controllers;

use App\Services\OauthService;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends BaseController {
    protected $oauthService;

    public function __construct() {
        $this->oauthService = new OauthService();
    }

    public function redirect() {
        return Socialite::driver('google')->redirect()->getTargetUrl();
    }

    public function getUser() {
        $user = Socialite::driver('google')->user();
        return $user->getName();
    }
}
