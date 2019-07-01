<?php
/**
 * @category  Test
 * @package   Test_Phaser
 * @author    Dilina Nilakshana <dnilakshana@gmail.com>
 * @copyright 2019  All rights reserved.
 */
include_once('models/AnalyzeInterface.php');
include_once('models/Analyze.php');
/**
 * Class Phrase
 */
class Phrase extends Controller
{

    protected $analyze;

    /**
     * Draft constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Action controller
     */
    public function execute()
    {
        $analyzeModel = new models\Analyze();
        $this->analyzeCharacters($analyzeModel);
    }

    /**
     * Analyze Characters
     * @param \models\AnalyzeInterface $analyzeInterface
     */
    public function analyzeCharacters(models\AnalyzeInterface $analyzeInterface)
    {
        $this->analyze = $analyzeInterface;
        $string = $_POST['string'];
        if($this->analyze->validate($string)) {
            $string = preg_replace('/\s+/', '', $string);
            $dataSet = str_split($string);
            $uniqueDataSet = array_count_values($dataSet);
            $grid = array();
            foreach ($uniqueDataSet as $key=>$value) {
                $keysCommon  = array_keys($dataSet, $key);
                $before      = $this->analyze->getBefore($keysCommon, $dataSet);
                $after       = $this->analyze->getAfter($keysCommon, $dataSet);
                $maxDistance = $this->analyze->getMaxDistance($keysCommon);

                $grid[$key]['column1'] = $key;
                $grid[$key]['column2'] = $value;
                $grid[$key]['column3'] = $before . ', '  .$after.$maxDistance;
            }
            $this->session->setValue('string', $_POST['string']);
            $this->session->setValue('analyze', serialize($grid));
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}