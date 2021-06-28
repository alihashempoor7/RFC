<?php

namespace App\Http\Controllers\API\V01\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use App\User;
use Carbon\Exceptions\InvalidDateException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use \Illuminate\Http\JsonResponse;
class AuthController extends Controller
{
    /**
     * @method POST
     * @param Request $request
     */
    public function register(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required'],

        ]);
        resolve(UserRepository::class)->create($request);

        return response()->json([
            'massage' => 'user created',
        ], 201);
    }

    /**
     * @method GET
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(Auth::user(), 200);
        }
        throw ValidationException::withMessages([
            'email' => 'incorrect credential'
        ]);
    }

    /**
     * @method GET
     * @return JsonResponse
     */
    public function user()
    {
        return response()->json(Auth::user(),200);
    }

    /**
     * @method POST
     * @return JsonResponse
     */
    public function logout()
    {
        Auth::logout();
        return response()->Json([
           "message"=> "user log out"
        ], 200);
    }

    /**
     * @param Request $request
     */


}
