<?php
class Pages extends Bootstrap {

    public function indexAction(){
        $view = new View();
        $view->render('sobre/index');
    }
    
    public function sobreAction(){
        $dados = new Model('cad_dados');
        $dado = $dados->selectAll(); 
        
        $view = new View();
        $view->render('pages/index', $dado);
    }

}