<?php

class Index extends Controller {

    function __construct() {
    }
    
    public function indexAction(){
        
        //$this->getParams('$name');
        print_r($this->_controller);
        echo 'VOCE ESTA NA INDEX';
    }

}