<?php

class adminModel extends Model {


    public function getAllWebUser($nivel) {
        $dados['linha'] = $this->sql("SELECT * FROM web_usuario WHERE nivel = '{$nivel}' ORDER BY nome ASC", 1);
    }

   
    public function getLikeUser($info) {
        $dados['linha'] = $this->sql("SELECT * FROM web_usuario WHERE 
                                        nivel = 'cliente' AND
                                        nome LIKE '%{$info}%' OR
                                        nivel = 'cliente' AND
                                        id LIKE '%{$info}%' OR
                                        nivel = 'cliente' AND
                                        user LIKE '%{$info}%'
                                        ORDER BY nome ASC", 1);


        return $dados;
    }

    
    public function insertCliente($array =  array()){
        
        parent::sql("INSERT INTO web_usuario VALUES("
                . "'null',"
                . "'{$array['nome']}', "
                . "'{$array['datanascimento']}', "
                . "'{$array['endereco']}', "
                . "'{$array['numero']}', "
                . "'{$array['bairro']}', "
                . "'{$array['estado']}', "
                . "'{$array['cidade']}', "
                . "'{$array['telefone']}', "
                . "'{$array['celular']}', "
                . "'{$array['rg']}', "
                . "'{$array['cpf']}', "
                . "'{$array['user']}', "
                . "'{$array['pass']}', "
                . "'{$array['nivel']}', "
                . "'{$array['sexo']}', "
                . "'{$array['ativo']}')");
                
       
    }


}