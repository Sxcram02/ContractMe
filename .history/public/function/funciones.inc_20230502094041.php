<?php
    /**
     * getAccount
     *
     * @param  string $userEmailLogin
     * @param  string $userPassLogin
     * @param  string $valueOption
     * @return void
     */

    function getAccount(string $userEmailLogin,string $userPassLogin, object $mySqlObject){
        $allowEntry = $mySqlObject -> hasUser($userEmailLogin,$userPassLogin);
        ($allowEntry)?header("Location: /public/src/index.php"):error_log("Error %d");
    }

    function setAccount(){
        (empty($valueOption)=="Crear cuenta")?false:header("Location: /public/src/index.php");
    }

?>