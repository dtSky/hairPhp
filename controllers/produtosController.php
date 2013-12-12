<?php
class Produtos extends Bootstrap {

    public function indexAction(){
        
        $view = new View();
        $view->render('produtos/index');
        
    }        

}