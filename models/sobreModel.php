<?php

class sobreModel extends Model {

    public function sobre(){
        $sql = $this->sql("SELECT * FROM cad_pages WHERE link = 'sobre'");
        return $sql;        
    }
    
    

}