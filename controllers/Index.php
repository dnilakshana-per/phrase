<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 */

/**
 * Class Index
 */
class Index extends Controller
{
    /**
     * Index constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->view->render('index');
    }
}