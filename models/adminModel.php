<?php

class adminModel extends Model {

    public function getAllWebUser(){
        $dados['linha'] = $this->sql("SELECT * FROM web_usuario WHERE nivel = 'cliente'", 1);
                
        return $dados;
    }
}