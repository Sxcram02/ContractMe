<?php
    include("../obj/clases.inc.php");
    /**
     * getAccount
     *
     * @param  string $valueOption
     * @param  string $userEmailLogin
     * @param  string $userPassLogin
     * @return void
     */
    function getAccount(string $userEmailLogin,string $userPassLogin, object $mySqlObject){
        $allowEntry = $mySqlObject -> hasUser($userEmailLogin,$userPassLogin);
        ($allowEntry)?header("Location: /public/src/index.php"):error_log("Error %d");
    }

    function setAccount(){
        (empty($valueOption))?false:header("Location: /public/src/index.php");
    }

?>