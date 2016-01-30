<?php
class SelectMenu {
    private $val;
    public function __construct($v){
    $this->val=$v;

    }
    public function getoption(){
    return $this->val;
    }



}