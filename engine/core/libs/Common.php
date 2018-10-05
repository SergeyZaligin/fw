<?php declare(strict_types = 1);

namespace engine\libs;

use engine\App;

/**
 * Class Common for common methods
 *
 * @author Sergey
 */
class Common {

    /**
     * Method is Post
     * 
     * @return boolean
     */
    public static function isPost(): bool 
    {
        if ('POST' == App::$app->request->server['REQUEST_METHOD']) {
            return true;
        }
        
        return false;
    }

    /**
     * Get request method
     * 
     * @return string
     */
    public static function getMethod(): string 
    {
        return App::$app->request->server['REQUEST_METHOD'];
    }

    /**
     * Get path url
     * 
     * @return string
     */
    public static function getPathUrl(): string 
    {
        $pathUrl = App::$app->request->server['REQUEST_URI'];

        // exists get params, cut get params
        if ($position = strpos($pathUrl, '?')) {
            $pathUrl = substr($pathUrl, 0, $position);
        }
        
        return $pathUrl;
    }
    
    /**
     * Get queryString url
     * 
     * @return string
     */
    public static function getQueryString(): string 
    {
        return trim(App::$app->request->server['QUERY_STRING'], '/');
    }

}
