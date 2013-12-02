<?php
class Pages extends Bootstrap {

    function __construct() {
    }
    
    public function indexAction(){
        $view = new View();
        $view->render('sobre/index');
    }
    
    public function sobreAction(){
        $view = new View();
        $view->render('sobre/index');
    }

}