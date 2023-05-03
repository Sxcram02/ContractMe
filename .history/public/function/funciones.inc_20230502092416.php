<?php
    
    /**
     * getPage
     *
     * @param  string $valueOption
     * @param  string $userEmailLogin
     * @param  string $userPassLogin
     * @return void
     */
    function getAccount($userEmailLogin,$userPassLogin){

        $mySqlObject = new Database("localhost","root","mdv21.389863","contractMe");
    
        switch($valueOption){
            
            case "Iniciar Sesión":
                $allowEntry = $mySqlObject -> hasUser($userEmailLogin,$userPassLogin);
                if($allowEntry){
                    header("Location: /public/src/index.php");
                } else {
                    echo error_log("Error %d");
                }
    }

    function setAccount(){
        if(empty($valueOption)){
            return false;
        }
    }

?>