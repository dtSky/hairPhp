<?php

//ADIÇÃO DE ARQUIVOS MVC
session_start();
require 'libs/Bootstrap.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Controller.php';


function __autoload($file) {
    $path = 'models/' . $file . '.php';

    if (file_exists($path))
        require $path;
    else
        echo "O model não existe";
}
$bootstrap = new Bootstrap();
$bootstrap->run();

