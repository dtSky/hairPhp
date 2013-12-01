<?php

class View {

    function __construct() {
        
    }

    public function activeLink($link) {
        $setAction = new Bootstrap;
        $link = $link . 'Action';
        
        if ($link == $setAction->_action)
            echo 'active';
    }

    public function render($file) {

        $_config = parse_ini_file('libs/config.ini');
        $path = 'views/' . $file . '.phtml';

        if (!file_exists($path))
            die("O arquivo nao existe");

        if ($_config['DEBUG'] == TRUE) {
            require $file;
        } else {
            require 'views/header.phtml';
            require 'views/' . $file . '.phtml';
            require 'views/footer.phtml';
        }
    }

}