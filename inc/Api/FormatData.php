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


    private function __construct()
    {
        //TODO Connect to database and fetch data from wp_options
        $formatData = json_decode(get_option('textFormat'),true);
        if (isset($formatData)) {
            $this->p = $formatData['p'];
            $this->h1 = $formatData['h1'];
            $this->h2 = $formatData['h2'];
            $this->h3 = $formatData['h3'];
            $this->h4 = $formatData['h4'];
            $this->h5 = $formatData['h5'];
            $this->h6 = $formatData['h6'];
        } else {
            $this->p = [];
            $this->h1 = [];
            $this->h2 = [];
            $this->h3 = [];
            $this->h4 = [];
            $this->h5 = [];
            $this->h6 = [];
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
            update_option('textFormat', wp_json_encode($arr));
        }
    }

    public static function updateFormat($data)
    {
        if (isset($data)) {
            self::$instance->{$data['hiddenTitle']} = $data;
        }
    }

}