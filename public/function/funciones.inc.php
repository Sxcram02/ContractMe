<?php
    function setHome($newFile){
        if(func_get_args()){
            readfile($newFile);
        }
    } 

?>