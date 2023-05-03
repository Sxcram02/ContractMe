<?php
    include("../")
    /**
     * getPage
     *
     * @param  string $valueOption
     * @param  string $userEmailLogin
     * @param  string $userPassLogin
     * @return void
     */
    function getAccount(string $userEmailLogin,string $userPassLogin, object $mysqlNewObj){
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