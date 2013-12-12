<?php
class Pages extends Bootstrap {

    public function indexAction(){
        $view = new View();
        $view->render('pages/index');
    }
    
    public function artigosAction(){
        $link = new Bootstrap;
        
        $dados = new Model();
        $dado = $dados->sql("SELECT * FROM cad_pages WHERE LINK = '{$link->_params['link']}'"); 
        
        $view = new View();
        $view->render('pages/index', $dado);
        
        
    }

}