<?php

class adminModel extends Model {

    public function getAllWebUser() {
        $dados['linha'] = $this->sql("SELECT * FROM web_usuario WHERE nivel = 'cliente' ORDER BY nome ASC", 1);

        return $dados;
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

}