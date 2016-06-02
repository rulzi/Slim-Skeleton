<?php

namespace App\Auth;

use App\Model\User;

class Auth
{
    public function attempt($email, $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            return false;
        }

        if (password_verify($password, $user->password)){
            $_SESSION['user'] = $user->id;
            return true;
        }

        return true;
    }

    public function check()
    {
        if(!isset($_SESSION['user'])){
            return false;
        }

        return true;
    }

    public function logout()
    {
        unset($_SESSION['user']);

        return true;
    }

    public function getUser()
    {
        $user = User::find($_SESSION['user']);

        return $user;
    }
}