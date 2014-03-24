<?php

class Admin extends Bootstrap {

    function __construct() {
        if (!isset($_SESSION['nivel']) or !isset($_SESSION['logado'])) {
            header('Location: entrar');
        }
    }

    //INDEX
    public function indexAction() {
        $view = new View();
        $view->renderLogado('admin/index');
    }

    //CLIENTE

    public function pesquisaAction($model) {
        if (isset($_POST['search']) and $_POST['search'] != '') {
            $arrayClientes = $model;
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
    }

    public function clienteAction() {


        $admModel = new adminModel();
        $arrayClientes = $admModel->getAllWebUser('cliente');

        $view = new View();

        $arrays = parent::getFirstParams();


        $pesquisa = new Admin;
        if (isset($_POST['search'])):
            $pesquisa->pesquisaAction($admModel->getLikeUser($_POST['search']));
        endif;



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

        if ($arrays != NULL) {
            foreach ($arrays as $key => $value) {
                switch ($key) {
                    case 'add':
                        if(isset($_POST['estado']) and isset($_POST['cidade'])){
                            $admModel->insertCliente(array(
                                                        'nome' => $_POST['nome'],
                                                        'datanascimento' => $_POST['datanascimento'],
                                                        'endereco' => $_POST['endereco'],
                                                        'numero' => $_POST['numero'],
                                                        'bairro' => $_POST['bairro'],
                                                        'estado' => $_POST['estado'],
                                                        'cidade' => $_POST['cidade'],
                                                        'telefone' => $_POST['telefone'],
                                                        'celular' => $_POST['celular'],
                                                        'rg' => $_POST['rg'],
                                                        'cpf' => $_POST['cpf'],
                                                        'user' => $_POST['user'],
                                                        'pass' => $_POST['pass'],
                                                        'nivel' => 'cliente',
                                                        'sexo' => $_POST['sexo'],
                                                        'ativo' => 1));
                        }
                        //print_r($arrrays);
                        $view->renderLogado('admin/cliente/add', $arrays);
                        break;
                    case 'alter':
                        $view->renderLogado('admin/cliente/alter', $arrays);
                        break;
                    case 'delete':
                        $view->renderLogado('admin/cliente/delete', $arrays);
                        break;
                    default :
                         echo $key;
                        //$view->renderLogado('admin/index');
                        break;
                }
                return FALSE;
            }
        }



        $view->renderLogado('admin/cliente/index', $arrayClientes);
        
                        }
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
