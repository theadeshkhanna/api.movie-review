<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Requests\SignUpRequest;
use App\Api\V1\Transformers\UserTransformer;
use App\Services\UserService;

class UserController extends BaseController {
    protected $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function createUser(SignUpRequest $request) {
        $user = $this->userService->createUser($request);
        return $this->response->item($user, new UserTransformer());
    }
}
