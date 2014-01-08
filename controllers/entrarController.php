<?php

class Entrar extends Bootstrap {

    public function indexAction() {

        $Msg['error'] = NULL;
        
        if(isset($_SESSION['logado']) and $_SESSION['nivel'] != '' and $_SESSION['logado'] == TRUE)
            header('Location: '.$_SESSION['nivel']);
        
        if (isset($_POST['user']) and isset($_POST['password'])) {

            $dado = new entrarModel();

            $logado = $dado->checkUser($_POST['user'], $_POST['password']);
                
            if ($logado['num'] == 1 and $logado['linha']['ativo'] == 1) {
                $_SESSION['logado'] = TRUE;
                $_SESSION['nivel'] = $logado['linha']['nivel'];
                $_SESSION['id'] = $logado['linha']['id'];
                $_SESSION['nome'] = $logado['linha']['nome'];
                
                //var_dump($logado);
                header('Location: '.$_SESSION['nivel']);
            } else {
                $Msg['error'] = 'Seu usuário ou senha estão errados';
            }
        }

        $view = new View();
        $view->render('entrar/index', $Msg);
    }

}