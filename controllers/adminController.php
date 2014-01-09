<?php

class Admin extends Bootstrap {

    function __construct() {
        if (!isset($_SESSION['nivel']) or !isset($_SESSION['logado']))
            header('Location: entrar');
    }

    //INDEX
    public function indexAction() {
        $view = new View();
        $view->renderLogado('admin/index');
    }

    //CLIENTE
    public function clienteAction() {


        $admModel = new adminModel();
        $arrayClientes = $admModel->getAllWebUser();

        $view = new View();

        $arrays = parent::getFirstParams();


        if (isset($_POST['search']) and $_POST['search'] != '') {
            $arrayClientes = $admModel->getLikeUser($_POST['search']);
            foreach ($arrayClientes['linha'] as $linha => $valor) {
                echo 
                "<tr class='alt_content'>",
                    "<td>" . $valor['id'] . "</td>",
                    "<td>" . $valor['nome'] . "</td>",
                    "<td>" . $valor['user'] . "</td>",
                    "<td>" . $valor['ativo'] . "</td>",
                    "<td> Opções </td>",
                "</tr>";
            }
            return FALSE;
        }
        if ($arrays != NULL) {

            foreach ($arrays as $key => $value) {
                switch ($key) {
                    case 'add':
                        $view->renderLogado('admin/cliente/add', $arrays);
                        break;
                    case 'alter':
                        $view->renderLogado('admin/cliente/alter', $arrays);
                        break;
                    case 'delete':
                        $view->renderLogado('admin/cliente/delete', $arrays);
                        break;
                    case 'pg':
                        $view->renderLogado('admin/index', $arrays);
                        break;
                    default :
                        $view->renderLogado('admin/index');
                        break;
                }
                return FALSE;
            }
        }



        $view->renderLogado('admin/cliente/index', $arrayClientes);
    }

    //FUNCIONARIO
    public function funcionarioAction() {

        $view = new View();
        $view->renderLogado('admin/index');
    }

    //SAIR
    public function sairAction() {
        session_destroy();
        header('Location: ../entrar');
    }

}