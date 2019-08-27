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

    public function __construct()
    {
        //TODO Connect to database and fetch data from wp_options
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
            'h6' => $this->h6,
        ];
    }

}