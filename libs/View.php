<?php

class View {

    public function activeLink($link) {
        $setController = new Bootstrap;
        $link = $link;

        if ($link == $setController->_controller) {
            echo 'active';
        }
    }

    public function render($file, $vars = null) {
        //ADD VARIAVEIS PARA view_NOMEDAVARIAVEL
        if (is_array($vars) && count($vars) > 0):
            $vars = extract($vars, EXTR_PREFIX_ALL, 'view');
        endif;
        //ADD CONFIG FILE
        $_config = parse_ini_file('libs/config.ini');

        $path = 'views/' . $file . '.phtml';

        if (!file_exists($path)) {
            die("O arquivo nao existe");
        }
        if ($_config['DEBUG'] == TRUE) {
            require $path;
        } else {
            require 'views/header.phtml';
            require 'views/menu.phtml';
            require 'views/' . $file . '.phtml';
            require 'views/footer.phtml';
        }
    }
    
    public function renderLogado($file, $vars = null) {
        //VERIFY IF USER IS LOGGED
        if(!isset($_SESSION['nivel']) or !isset($_SESSION['nivel'])){
            header('Location: entrar');
        }
        //ADD VARIAVEIS PARA view_NOMEDAVARIAVEL
        if (is_array($vars) && count($vars) > 0):
            $vars = extract($vars, EXTR_PREFIX_ALL, 'view');
        endif;
        //ADD CONFIG FILE
        $_config = parse_ini_file('libs/config.ini');

        $path = 'views/' . $file . '.phtml';

        if (!file_exists($path)) {
            die("O arquivo nao existe");
        }
        if ($_config['DEBUG'] == TRUE) {
            require $path;
        } else {
            require 'views/header.phtml';
            require 'views/'.$_SESSION['nivel'].'/menu.phtml';
            require 'views/' . $file . '.phtml';
            require 'views/footer.phtml';
        }
    }
    

}