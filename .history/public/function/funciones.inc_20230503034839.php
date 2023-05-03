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
        if($allowEntry)?header("Location: /public/src/index.php"):error_log("Error %d");
    }

    function setAccount(string $valueOption){
        (empty($valueOption)=="Crear cuenta")?false:header("Location: /public/src/index.php");
    }

?>