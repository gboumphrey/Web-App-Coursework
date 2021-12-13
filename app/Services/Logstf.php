<?php

namespace App\Services;

class Logstf{
    private $apiKey;

    public function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

    public function getlogs($logtitle){
        //search api for given term
        //return number of matches from json
        $json = file_get_contents('http://logs.tf/api/v1/log?title='.$logtitle);
        $decoded = json_decode($json);
        echo $decoded->results; //45
    }
}