<?php

namespace App\Api\V1\Controllers;

use App\Api\V1\Exceptions\InvalidCredentialsException;
use App\Api\V1\Exceptions\UserNotExistsException;
use App\Api\V1\Requests\BaseRequest;
use App\Api\V1\Requests\SignUpRequest;
use App\Api\V1\Transformers\UserTransformer;
use App\Services\UserService;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends BaseController {
    protected $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    public function createUser(SignUpRequest $request) {
        $user = $this->userService->createUser($request);
        return $this->response->item($user, new UserTransformer());
    }

    public function loginUser(BaseRequest $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password'  => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        $user = User::where('email', $request->get('email'))->first();

        if (!$user) {
            throw new UserNotExistsException();
        }

        if (Hash::check($user->password, $request->get('password'))) {
            $token = JWTAuth::fromUser($user);
        } else {
            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    throw new InvalidCredentialsException();
                }
            } catch (JWTException $e) {
                throw new InvalidCredentialsException();
            }
        }

        return [
            'token'          => $token,
            'user'           => (new UserTransformer())->transform($user)
        ];
    }

    public function logoutUser() {
        JWTAuth::invalidate(JWTAuth::getToken());
    }
}
