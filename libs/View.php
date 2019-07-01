<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 */
/**
 * Class View
 */
class View
{
    /**
     * Render view files
     * @param $name
     */
    public function render($name)
    {
        require 'views/'.$name.'.php';
    }
}