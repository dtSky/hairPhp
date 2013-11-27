<?php
class Index extends Bootstrap {

    function __construct() {
    }
    
    public function indexAction(){
        
        //$this->getParams('$name');
        
        echo 'VOCE ESTA NA INDEX';
    }
    
    public function novoAction(){
        echo $this->getParams('nome');
    }

}