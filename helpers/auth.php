<?php

class authHelper {

    public function goController() {
        
    }
    
    public function goAction() {
        
    }
    
    public function nivelAction() {
        if(isset($_SESSION['logged']) AND isset($_SESSION['nivel']))
            $nivel = base64_decode ($_SESSION['nivel']);
    }

}