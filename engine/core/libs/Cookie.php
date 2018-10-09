<?php declare(strict_types = 1);

namespace engine\libs;

use engine\App;

class Cookie {

    /**
     * Add cookies
     * 
     * @param $key
     * @param $value
     * @param int $time
     */
    public static function set(string $key, string $value, int $time = 31536000): void 
    {
        setcookie($key, $value, time() + $time, '/');
    }

    /**
     * Get cookies by key
     * 
     * @param $key
     * @return mixed string|null
     */
    public static function get(string $key) 
    {
        if (isset(App::$app->request->cookie[$key])) {
            return App::$app->request->cookie[$key];
        }
        return null;
    }

    /**
     * Delete cookies by key
     * 
     * @param $key
     */
    public static function delete(string $key): void
    {
        if (isset(App::$app->request->cookie[$key])) {
            self::set($key, '', -3600);
            unset(App::$app->request->cookie[$key]);
        }
    }

}
