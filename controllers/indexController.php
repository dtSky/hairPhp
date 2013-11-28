<?php
class Index extends Bootstrap {

    function __construct() {
    }
    
    public function indexAction(){
        //echo 'VOCE ESTA NA INDEX';
        $this->render('index/index');
    }
    
    public function novoAction(){
        $this->uu = 'Teste';
        $this->render('index/novo');
    }

}