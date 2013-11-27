<?php
//ADIÇÃO DE ARQUIVOS MVC
require 'libs/Bootstrap.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Controller.php';

function __autoload($file){
    require 'models/' . $file . '.php';
}

$bootstrap = new Bootstrap();
$bootstrap->run();