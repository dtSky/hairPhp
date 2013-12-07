<?php
class Pages extends Bootstrap {

    public function indexAction(){
        $view = new View();
        $view->render('sobre/index');
    }
    
    public function sobreAction(){
        $link = str_ireplace('Action', '', $this->_action);
        
        $dados = new Model();
        $dado = $dados->sql("SELECT * FROM cad_pages WHERE LINK = '{$link}'"); 
        
        $view = new View();
        $view->render('pages/index', $dado);
    }

}