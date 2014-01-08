<?php

class entrarModel extends Model {

    public function checkUser($user, $pass){
        $dados = $this->numRows("SELECT * FROM web_usuario WHERE user = '{$user}' AND pass = '{$pass}'");
        
        return $dados;
    }
}