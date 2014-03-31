<?php

class Admin extends Bootstrap {
    public $view;
    
    function __construct() {
        $this->view = new View();
        if (!isset($_SESSION['nivel']) or !isset($_SESSION['logado'])) {
            header('Location: entrar');
        }
        
    }

    //INDEX
    public function indexAction() {
        $this->view->renderLogado('admin/index');
    }

    //CLIENTE
    public function clienteAction() {
        $dados = new adminModel;
        $params = parent::getAllParams();
        if (is_array($params)) {
            switch ($params['action']) {
                case 'new':
                    $this->view->renderLogado('admin/cliente/add');
                    break;
                case 'edit':
                    $this->view->renderLogado('admin/cliente/alter', $dados->getUserId($params['id']));
                    break;
                default : $this->view->render('error/404');
                    break;
            }
            return FALSE;
        }

        $this->view->renderLogado('admin/cliente/index', $dados->getAllWebUser('cliente'));
    }

    //FUNCIONARIO
    public function funcionarioAction() {
        $dados = new adminModel;
        
        $params = parent::getAllParams();
        if (is_array($params)) {
            switch ($params['action']) {
                case 'new':
                    $this->view->renderLogado('admin/funcionario/add');
                    break;
                case 'edit':
                    $this->view->renderLogado('admin/funcionario/alter', $dados->getUserId($params['id']));
                    break;
                default : $this->view->render('error/404');
                    break;
            }
            return FALSE;
        }

        $this->view->renderLogado('admin/funcionario/index', $dados->getAllWebUser('funcionario'));
    }
    //FAZER PEDIDO
    public function pedidoAction(){
        $this->view->render('admin/controle/pedido');
    }
    //SAIR
    public function sairAction() {
        session_destroy();
        header('Location: ../entrar');
    }

}
