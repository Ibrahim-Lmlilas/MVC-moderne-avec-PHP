<?php

namespace App\Core;

class Auth {
    public static function attempt($email, $password) {
        // Here you would typically:
        // 1. Find user by email
        // 2. Verify password
        // 3. Set session if valid
        $user = \App\Models\User::where('email', $email)->first();
        
        if ($user && password_verify($password, $user->password)) {
            Session::set('user_id', $user->id);
            Session::set('user_role', $user->role);
            return true;
        }
        
        return false;
    }

    public static function check() {
        return Session::get('user_id') !== null;
    }

    public static function user() {
        $userId = Session::get('user_id');
        if ($userId) {
            return \App\Models\User::find($userId);
        }
        return null;
    }

    public static function logout() {
        Session::delete('user_id');
        Session::delete('user_role');
    }

    public static function hasRole($role) {
        return Session::get('user_role') === $role;
    }
}
