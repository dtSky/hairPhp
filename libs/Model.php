<?php

class Model {

    public $mysql;
    public $_table;

    public function __construct($_table = NULL){
        $this->_table = $_table;
        $config = parse_ini_file('libs/config.ini');

        try{
            $this->mysql = new PDO("mysql:dbname={$config['DB']};host={$config['DNS']}", $config['USER'], $config['PASSWORD']);
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }

    public function selectAll(){
        $sql = $this->mysql->query("SELECT * FROM {$this->_table};");
        return $sql->fetch();
    }

    public function sql($sql){
        if ($sql != NULL):
            $sql = $this->mysql->query($sql);
            return $sql->fetch();
        else:
            die("Precisa ter o SQL");
        endif;
    }

}
