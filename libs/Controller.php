<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.

 * Class Controller
 */
class Controller
{
    /**
     * @var View
     */
    protected $view;

    /**
     * @var Session
     */
    protected $session;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->view = new View();
        $this->session = new \libs\Session();
        $this->session->sessionStart();
    }
}