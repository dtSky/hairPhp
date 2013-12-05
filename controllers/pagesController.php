<?php
class Pages extends Bootstrap {

    function __construct() {
    }
    
    public function indexAction(){
        $view = new View();
        $view->render('sobre/index');
    }
    
    public function sobreAction(){
        $dados = new Model();
        $dado[] = $dados->describe(); 
        $view = new View();
        $view->render('sobre/index', $dado);
    }

}