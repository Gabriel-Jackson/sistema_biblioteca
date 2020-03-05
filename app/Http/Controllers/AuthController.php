<?php
use Controller;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate()
    {
        if (Auth::attempt(['login' => $login, 'password' => $password]))
        {
            return redirect()->intended('dashboard');
        }
    }
}

