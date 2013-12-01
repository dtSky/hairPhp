<?php

class Bootstrap{

    protected $_url;
    protected $_explode;
    public $_controller;
    public $_action;
    public $_params;

    public function __construct() {
        $this->setUrl();
        $this->setExplode();
        $this->setController();
        $this->setAction();
        $this->setParams();
    }

    private function setUrl() {
        $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : 'index/index');
        $this->_url = rtrim($_GET['url'], '/');
    }

    private function setExplode() {
        $this->_explode = explode('/', $this->_url);
    }

    private function setController() {
        $this->_controller = $this->_explode[0];
    }

    private function setAction() {
        $action = (!isset($this->_explode[1]) || $this->_explode[1] == NULL || $this->_explode[1] == 'index' ? 'index' : $this->_explode[1]);
        $this->_action = $action . 'Action';
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
        }
    }

    public function getParams($name) {
        $bootstrap = new Bootstrap();

        if (!array_key_exists($name, $bootstrap->_params))
            die("O valor nao existe no array");

        return $bootstrap->_params[$name];
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

}