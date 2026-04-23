<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class AuthHelper
{
    public static function check()
    {
        return Session::get('is_logged_in', false);
    }

    public static function user()
    {
        return Session::get('google_user', null);
    }

    public static function id()
    {
        $user = self::user();
        return $user ? $user['id'] : null;
    }

    public static function name()
    {
        $user = self::user();
        return $user ? $user['name'] : null;
    }

    public static function email()
    {
        $user = self::user();
        return $user ? $user['email'] : null;
    }

    public static function logout()
    {
        Session::forget('google_user');
        Session::forget('is_logged_in');
    }
}
