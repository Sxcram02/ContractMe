<?php
    
    /**
     * getAccount
     *
     * @param  string $userEmailLogin
     * @param  string $userPassLogin
     * @param  string $valueOption
     * @return void
     */

    function getAccount(string $userEmailLogin,string $userPassLogin){
        $allowEntry = $mySqlObject -> hasUser($userEmailLogin,$userPassLogin);
        if($allowEntry){
            header("Location: /public/src/index.php");
        } else {
            error_log("Error %d");
        }
    }

    function setAccount(string $valueOption){
        (empty($valueOption)=="Crear cuenta")?false:header("Location: /public/src/index.php");
    }

?>