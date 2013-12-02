<?php

class Model{

    public $mysql;

    public function __construct() {
        $config = parse_ini_file('libs/config.ini');
        $this->mysql = new PDO("mysql:dbname={$config['DB']};host={$config['DNS']}", $config['USER'], $config['PASSWORD']);
    }
    
    public function describe(){
        $sql = $this->mysql->query('DESCRIBE teste;');
        return $sql->fetchAll();
    }
    

}