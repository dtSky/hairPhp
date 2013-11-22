<?php

class Bootstrap {

    private $_url;
    private $_explode;
    public $_controller;
    public $_action;
    public $_params;

    function __construct() {
        $this->setUrl();
        $this->setExplode();
        $this->setController();
        $this->setAction();
        $this->setParams();
    }

    private function setUrl() {
        $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : 'index');
        $this->_url = $_GET['url'];
    }

    private function setExplode() {
        $rtrim = rtrim($this->_url, '/');
        $this->_explode = explode('/', $rtrim);
    }

    private function setController() {
        $this->_controller = $this->_explode[0];
    }

    private function setAction() {
        $this->_action = (!isset($this->_explode[1]) || $this->_explode[1] == "index" ? "indexAction" : $this->_explode[1] . 'Action');
    }

    private function setParams() {
        unset($this->_explode[0], $this->_explode[1]);

        $i = 0;
        if (!empty($this->_explode)) {
            foreach ($this->_explode as $value) {
                if ($i % 2 == 0)
                    $ind[] = $value;
                else
                    $val[] = $value;
                $i++;
            }

            if (count($val) == count($ind) and !empty($ind) and !empty($val))
                $this->_params = array_combine($ind, $val);
            else
                $this->_params = array();
            print_r($this->_params);
        }
        
    }
    
    public function getParams($name){
        echo $name;
    }

    public function run() {
        $controller_path = 'controllers/' . $this->_controller . 'Controller.php';

        if (!file_exists($controller_path))
            die('O controller não existe');

        require $controller_path;
        $app = new $this->_controller();

        if (!method_exists($app, $this->_action))
            die('A action não existe');

        $app->{$this->_action}();
    }

    //ERRO DEVERÁ INCLUIR O ARQUIVO DE ERRO
    public function error() {
        echo "FODEU DEU EEERRROOOO";
    }

}

