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
        if($allowEntry){
            $_SESSION['user'] = $userEmailLogin;
            header("Location: /public/src/index.php");
            exit();
        } else {
            error_log("Error %d");
        }
    }

    function setAccount(string $valueOption){
        (empty($valueOption)=="Crear cuenta")?false:header("Location: /public/src/index.php");
    }

?>