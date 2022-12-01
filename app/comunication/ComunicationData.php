<?php

namespace app\comunication;

class ComunicationData
{

    private $arrayData;

    public function __construct($file)
    {
        $this->arrayData = file_get_contents($file);
    }


    public function getApiData() : array
    {

        return [];
    }

     
}