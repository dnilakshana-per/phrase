<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 *
 */

namespace models;

interface AnalyzeInterface
{
    /**
     * Validate Date
     * @param $string
     * @return mixed
     */
    public function validate($string);

    /**
     * Get Max Distance
     * @param $commonData
     * @return mixed
     */
    public function getMaxDistance($commonData);

    /**
     * Get After Data
     * @param $keys
     * @param $dataSet
     * @return mixed
     */
    public function getAfter($keys,$dataSet);

    /**
     * Get Before Data
     * @param $keys
     * @param $dataSet
     * @return mixed
     */
    public function getBefore($keys,$dataSet);
}