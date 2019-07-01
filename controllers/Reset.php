<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 */

/**
 * Class Draft
 */
class Reset extends Controller
{
    /**
     * Reset constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Delete session method
     */
    public function index()
    {
        if(isset($_SESSION)) {
            $this->session->deleteSession();
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}