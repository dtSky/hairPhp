<?php

//TRATAMENTO DE URL
$_GET['url'] = (isset($_GET['url']) ? $_GET['url'] :'index');
$rtrim = rtrim($_GET['url'], '/');
$url = explode('/', $rtrim);
$controller = $url[0];
$method = $url[1];
$param = $url[2];

require 'controllers/'.$controller.'Controller.php';
