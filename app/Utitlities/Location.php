<?php

namespace App\Utitlities;


class Location{

    private $options;

    const URL_END = "http://ip-api.com/batch";

    public function __construct(){
       $this->options = [
            'http' => [
                'method' => 'POST',
                'user_agent' => 'Batch-Example/1.0',
                'header' => 'Content-Type: application/json',
            ]
        ];

    }

    public function setIpAddress(string $ip){
         $ips = array($ip);
         $this->options['http']['content'] = json_encode($ips);
        return $this;
    }

    public function send(){
        $response =  file_get_contents(self::URL_END, false, stream_context_create($this->options));
    

        return json_decode($response , true)[0];
    } 

    


}