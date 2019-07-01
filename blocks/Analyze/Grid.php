<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 */

namespace blocks\Analyze;

/**
 * Class Grid
 */
class Grid
{
    /**
     * @var \libs\Session
     */
    private $session;

    /**
     * Percentage constructor.
     */
    public function __construct()
    {
        $this->session = new \libs\Session();
    }

    /**
     * @return float|int
     */
    public function getGridData()
    {
        $analyze = $this->session->getValue('analyze');
        if($analyze !== '') {
            return unserialize($analyze);
        }
        return false;
    }

}