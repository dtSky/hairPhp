<?php

class Model {

    public $mysql;
    public $_table;

    public function __construct($_table = NULL) {
        $this->_table = $_table;
        $config = parse_ini_file('libs/config.ini');

        try {
            $this->mysql = new PDO("mysql:dbname={$config['DB']};host={$config['DNS']}", $config['USER'], $config['PASSWORD']);
        } catch (Exception $exc) {

            $view = new View();
            $view->render('error/offline');

            error_reporting(0);

            return FALSE;

            //die($exc->getMessage());
        }
    }

    protected function selectAll() {
        $sql = $this->mysql->query("SELECT * FROM {$this->_table};");
        return $sql->fetch();
    }

    protected function sql($sql, $fetchAll = NULL) {
        if ($sql != NULL and $fetchAll == NULL):
            $sql = $this->mysql->query($sql);
            return $sql->fetch(PDO::FETCH_ASSOC);
        elseif ($sql != NULL and $fetchAll != NULL):
            $sql = $this->mysql->query($sql);
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        else:
            die("Precisa ter o SQL");
        endif;
    }

    protected function numRows($sql) {
        $sql = $this->mysql->query($sql);

        $linha = $sql->fetch(PDO::FETCH_ASSOC);
        $num = $sql->rowCount();

        $array['linha'] = $linha;
        $array['num'] = $num;

        return $array;
    }

}
