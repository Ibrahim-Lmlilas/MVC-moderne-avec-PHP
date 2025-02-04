<?php

namespace App\Core;

class Session {
    public static function start() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null) {
        return $_SESSION[$key] ?? $default;
    }

    public static function delete($key) {
        unset($_SESSION[$key]);
    }

    public static function destroy() {
        session_destroy();
    }

    public static function hasFlash($key) {
        return isset($_SESSION['flash'][$key]);
    }

    public static function flash($key, $message = null) {
        if ($message !== null) {
            $_SESSION['flash'][$key] = $message;
        } else {
            $message = $_SESSION['flash'][$key] ?? null;
            unset($_SESSION['flash'][$key]);
            return $message;
        }
    }
}
