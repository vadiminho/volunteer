<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\SignInRequest;
use App\Http\Requests\V1\User\SignUpRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Subgroup;

#[Group('User')]
class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    #[Subgroup('Auth')]
    #[Endpoint('Sign Up')]
    public function signUp(SignUpRequest $request)
    {
        return $this->userService->createRecord($request->validated());
    }

    #[Subgroup('Auth')]
    #[Endpoint('Sign In')]
    public function signIn(SignInRequest $request)
    {
        $user = User::where('email', $request->input('email'))->firstOrFail();
        return $user->createToken(mt_rand(0, 100))->plainTextToken;
    }

}
