<?php
    include("./../obj/clases.inc.php");
    $mySqlObject = new Database("localhost","root","mdv21.389863","contractMe");
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
            header("Location: /public/src/index.php");
        } else {
            error_log("Error %d");
        }
    }

    function setAccount(string $valueOption){
        (empty($valueOption)=="Crear cuenta")?false:header("Location: /public/src/index.php");
    }

?>