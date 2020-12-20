<?php

namespace App\Helpers;
use Session;

class UserAuthorization {

    public static function getUserID() {
        return Session::get('users_id');
    }

    public static function hasPermission($permission_name) {

    }
}