<?php
    include("../obj/clases.inc.php");
    /**
     * getPage
     *
     * @param  string $valueOption
     * @param  string $userEmailLogin
     * @param  string $userPassLogin
     * @return void
     */
    $mySqlObject
    function getAccount(string $userEmailLogin,string $userPassLogin, object $my){
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