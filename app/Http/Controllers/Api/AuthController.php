<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller {

    public function register() {
        $rules = [
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];

        $response = $this->validateWithJson(request()->all(), $rules);

        if ($response === true) {

            $data = [
                'full_name' => request()->input('full_name'),
                'email' => strtolower(request()->input('email')),
                'password' => bcrypt(request()->input('password')),
                'signup_role' => request()->input('signup_role'),
            ];

            try {
                $user = User::create($data);
                return $this->respondWithSuccess('Registration successful.', ['user' => UserResource::make($user)]);
            } catch (\Exception $exception) {
                return $this->respondWithError($exception->getMessage());
            }
        } else {
            return $this->respondWithError('Data validation failed.', $response);
        }
    }

    public function login() {

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $response = $this->validateWithJson(request()->all(), $rules);
        if ($response === true) {

            if (User::where('email', '=', Input::get('email')) && User::where('password', '=', Input::get('password'))) {
                $user = DB::table('users')->where('email', Input::get('email'))->first();
                return $this->respondWithSuccess('User authenticated.', ['user_details' => (array) $user]);
            } else {
                return $this->respondWithError('Invalid credentials.');
            }
        } else {
            return $this->respondWithError('Data validation failed.', $response);
        }
    }

}
