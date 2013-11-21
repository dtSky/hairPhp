<?php

class Bootstrap {

    function __construct() {
        //TRATAMENTO DE URL
        $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : 'index');
        $rtrim = rtrim($_GET['url'], '/');
        $url = explode('/', $rtrim);
        
        //DEFINIÇÃO DE VARIAVEIS
        $controller = $url[0];
        $method = (isset($url[1]) ? $url[1] : 'index');
        $param = (isset($url[2]) ? $url[2] : '');
        
        echo 'Controller: '.$controller.'<br>',
             'Method: '.$method.'<br>',
             'Parametro: '.$param.'<br>';

        $filename = '/controllers/' . $controller . 'Controller.php';
        //CHECAR SE ARQUIVO EXISTE
        if(file_exists($filename)){
            require $filename;
        }else{
            $this->error();
        }
        $bootstrap = new $controller();
        
        if(isset($param)){
            if(method_exists($bootstrap, $method)){
                $controller->{$method}($param);
            }else{
                $this->error();
            }
        }else{
            if(method_exists($bootstrap, $method)){
                $controller->{$method}();
            }else{
                $this->error();
            }
        }
    }
    
    //ERRO DEVERÁ INCLUIR O ARQUIVO DE ERRO
    public function error(){
        echo "FODEU DEU EEERRROOOO";
    }
            

}

