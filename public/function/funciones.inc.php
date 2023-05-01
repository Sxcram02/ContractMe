<?php
    
    /**
     * getPage
     *
     * @param  string $valueOption
     * @param  string $userEmailLogin
     * @param  string $userPassLogin
     * @return void
     */
    function getPage($valueOption,$userEmailLogin,$userPassLogin){

        $mySqlObject = new Database("localhost","root","mdv21.389863","contractMe");
    
        switch($valueOption){
            
            case "Iniciar Sesión":
                $allowEntry = $mySqlObject -> hasUser($userEmailLogin,$userPassLogin);
                if($allowEntry){
                    // session_start();
                    // $_SESSION['loggedIn'] = true;
                    header("Location: /public/src/index.php");
                } else {
                    echo error_log("Error %d");
                }
                break;
            case "Crear cuenta":
                
                $mySqlObject-> setUser($_POST['nombre'],$_POST['apellido'],$_POST['contrasenya'],$userEmailLogin,$_POST['movil']);
                
                break;
            case "Ver Aspirantes":
                
                $mySqlObject-> getQuery();
                break;
        }
    }
    ?>