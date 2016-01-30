<?php

class ItunesRss {
    private $data;
    public function __construct($val){
        $this->data=simplexml_load_file($val);
    }
    public function getRequest(){
        return $this->data;
    }
    


}