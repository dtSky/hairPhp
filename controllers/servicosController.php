<?php
class Servicos extends Bootstrap {

    public function indexAction(){
        
        $view = new View();
        $view->render('servicos/index');
        
    }        

}