<?php

class Model {

    public $mysql;

    public function __construct() {
        $config = parse_ini_file('libs/config.ini');
        try {
            $this->mysql = new PDO("mysql:dbname={$config['DB']};host={$config['DNS']}", $config['USER'], $config['PASSWORD']);
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

    public function describe() {
        $sql = $this->mysql->query('SELECT * FROM cad_dados;');
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

}