<?php


namespace Inc\Api;

//TODO Object that hold data about the elements
class FormatData
{
    private $p;
    private $h1;
    private $h2;
    private $h3;
    private $h4;
    private $h5;
    private $h6;

    private static $instance = null;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new FormatData();
        }
        return self::$instance;
    }


    private function __construct($default = null)
    {
        $formatData = json_decode(get_option('textFormat'),true);
        if (isset($formatData) && $default === null) {
            $this->p = $formatData['p'];
            $this->h1 = $formatData['h1'];
            $this->h2 = $formatData['h2'];
            $this->h3 = $formatData['h3'];
            $this->h4 = $formatData['h4'];
            $this->h5 = $formatData['h5'];
            $this->h6 = $formatData['h6'];
        } else {
            $this->p = self::getDefaultOptions();
            $this->h1 = self::getDefaultOptions();
            $this->h2 = self::getDefaultOptions();
            $this->h3 = self::getDefaultOptions();
            $this->h4 = self::getDefaultOptions();
            $this->h5 = self::getDefaultOptions();
            $this->h6 = self::getDefaultOptions();
        }
    }

    public function toArray()
    {
        return [
            'p' => $this->p,
            'h1' => $this->h1,
            'h2' => $this->h2,
            'h3' => $this->h3,
            'h4' => $this->h4,
            'h5' => $this->h5,
            'h6' => $this->h6
        ];
    }

    public static function updateDatabase()
    {
        if (isset(self::$instance)) {
            $arr = self::$instance->toArray();
            //print_r($arr);
            update_option('textFormat', wp_json_encode($arr));
        }
    }

    public static function updateFormat($data)
    {
        if (isset($data)) {
            self::$instance->{$data['hiddenTitle']} = $data;
        }
    }

    private static function getDefaultOptions(){
        return [
            'color' => '#ffffff',
            'text-transform' => 'none',
            'text-align' => 'left',
            'font-size' => 12,
            'line-height' => 1,
            'letter-spacing' => 1,
            'background-color' => '#ffffff',
            'border-color' => '#ffffff',
            'border-width' => 1,
            'border-style' => 'solid',
            'border-radius' => 1,
        ];
    }

    public static function resetToDefault(){
        self::$instance = new FormatData(true);
        self::updateDatabase();
    }

}