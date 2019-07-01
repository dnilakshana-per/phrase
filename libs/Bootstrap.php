<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 */
/**
 * Class Bootstrap
 */
class Bootstrap
{
    /**
     * Bootstrap constructor.
     */
    public function __construct()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = rtrim($url);
        $requestUrl = ltrim($url, '/');
        $url = explode('/', $requestUrl);

        $className = '';
        if ($requestUrl == '') {
            $file = 'controllers/Index.php';
            $className = 'Index';
        } else {
            $file = 'controllers/' . ucwords($url[0]) . '.php';
            $className = ucwords($url[0]);
        }

        if (file_exists($file)) {
            require $file;
        } else {
            require 'controllers/error.php';
            $controller = new Error();
            return false;
        }

        $controller = new $className;
        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        }
    }
}