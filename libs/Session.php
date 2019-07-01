<?php
/**
 * @category  app
 * @package   app_poker
 * @author    Dilina Nilakshana <dnilakshan@yahoo.cona>
 * @copyright 2019 All rights reserved.
 */
namespace libs;

/**
 * Class Session
 */
class Session
{
    /**
     * Session Start
     */
    public function sessionStart()
    {
        session_start();
    }

    /**
     * Set session values
     * @param $key
     * @param $value
     */
    public function setValue($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get Session values
     * @param $key
     * @return mixed
     */
    public function getValue($key)
    {
        if(isset($_SESSION) && isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return '';
    }

    /**
     * Deleted session
     */
    public function deleteSession()
    {
        session_destroy();
    }
}