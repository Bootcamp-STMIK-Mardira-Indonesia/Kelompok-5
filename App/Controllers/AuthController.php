<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Packages\Auth;

class AuthController extends Controller
{
    public function login()
    {
        Auth::attempt(
            [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            ]
        );

        $this->response(401, [
            'message' => 'Invalid credentials'
        ]);
    }

    public function register()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        Auth::register([
            'username' => $username,
            'password' => $password
        ]);

        $this->response(401, [
            'message' => 'User already exists'
        ]);
    }

    public function logout() : void
    {
        Auth::logout();

        $this->response(401, [
            'message' => 'Invalid credentials'
        ]);
    }
}
