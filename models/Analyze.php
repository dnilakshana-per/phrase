<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 *
 */

namespace models;
include_once('AnalyzeInterface.php');

/**
 * Class Analyze
 */
class Analyze implements AnalyzeInterface
{
    /**
     * @var Session
     */
    protected $session;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        $this->session = new \libs\Session();
        $this->session->sessionStart();
    }

    /**
     * Validate Data
     * @param $string
     * @return bool|mixed
     */
    public function validate($string)
    {
        if($string === '') {
            $error = 'Please Enter String and Press Analyze Button';
            $this->session->setValue('error', true);
            $this->session->setValue('message', $error);
            return false;
        }
        $string = preg_replace('/\s+/', '', $string);
        if(strlen($string) > 255) {
            $error = 'Maximum number of string count should be 255.';
            $this->session->setValue('error', true);
            $this->session->setValue('message', $error);
            return false;
        }
        $this->session->setValue('error', false);
        return true;
    }

    /**
     * Get Max Distance
     * @param $commonData
     * @return mixed|string
     */
    public function getMaxDistance($commonData)
    {
        if(count($commonData) >= 2) {
            $firstKey = $commonData[0];
            $lastKey  = end($commonData);
            $chars    = $lastKey-$firstKey;
            return ', max-distance: '.$chars.' chars';
        }
        return '';
    }

    /**
     * Get After
     * @param $keys
     * @param $dataSet
     * @return string
     */
    public function getAfter($keys,$dataSet)
    {
        $after = array();
        foreach ($keys as $key) {
            if(isset($dataSet[$key-1])) {
                $after[] = $dataSet[$key-1];
            }
        }
        if(!empty($after)) {
            return 'after: '.implode(",",$after);
        } else {
            return 'after: none';
        }
    }

    /**
     * Get Before Data
     * @param $keys
     * @param $dataSet
     * @return string
     */
    public function getBefore($keys,$dataSet)
    {
        $before = array();
        foreach ($keys as $key) {
            if(isset($dataSet[$key+1])) {
                $before[] = $dataSet[$key+1];
            }
        }
        if(!empty($before)) {
            return 'before: '.implode(",",$before);
        } else {
            return 'before: none';
        }
    }
}