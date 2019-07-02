<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 *
 */
use PHPUnit\Framework\TestCase;

require 'models/Analyze.php';
require 'libs/Session.php';

class AnalyzeTest extends TestCase
{
    /**
     * @runInSeparateProcess
     */
    public function testValidate()
    {
        $analyze = new \models\Analyze;
        $validate = $analyze->validate('test');
        $this->assertEquals($validate, true);

        // Validate Empty string
        $validate = $analyze->validate('');
        $this->assertEquals($validate, false);

        // Validate Straing > 255
        $validate = $analyze->validate('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupi');
        $this->assertEquals($validate, false);
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetMaxDistance()
    {
        $array = array(2,3,4,7);
        $analyze  = new \models\Analyze;
        $distance = $analyze->getMaxDistance($array);
        $this->assertEquals($distance, ', max-distance: 5 chars');
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetAfter()
    {
        $array = array('h','e','l','l','o','w','t','e','s','t');

        $analyze  = new \models\Analyze;
        //compare character l
        $common = array(2,3);
        $distance = $analyze->getAfter($common,$array);
        $this->assertEquals($distance, 'after: e,l');

        //compare character h
        $common = array(0);
        $distance = $analyze->getAfter($common,$array);
        $this->assertEquals($distance, 'after: none');
    }

    /**
     * @runInSeparateProcess
     */
    public function testGetBefore()
    {
        $array = array('h','e','l','l','o','w','t','e','s','t');

        $analyze  = new \models\Analyze;
        //compare character l
        $common = array(2,3);
        $distance = $analyze->getBefore($common,$array);
        $this->assertEquals($distance, 'before: l,o');

        //compare character h
        $common = array(0);
        $distance = $analyze->getBefore($common,$array);
        $this->assertEquals($distance, 'before: e');

        //compare character t
        $common = array(9);
        $distance = $analyze->getBefore($common,$array);
        $this->assertEquals($distance, 'before: none');
    }
}
