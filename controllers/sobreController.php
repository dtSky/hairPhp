<?php
class Sobre extends Bootstrap {

    public function indexAction(){
        $dado = new sobreModel();
        $view = new View();
        $view->render('sobre/index', $dado->sobre());
        
    }        

}