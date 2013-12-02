<?php
class Index extends Bootstrap {

    function __construct() {
    }
    
    public function indexAction(){
        $teste = new indexModel();
        $teste->describeTeste();
        $view = new View();
        $view->render('index/index');
    }
    
    public function novoAction(){
        $view = new View();
        $view->render('index/novo');
    }

}