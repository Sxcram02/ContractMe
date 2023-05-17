<?php
    // session_start();

    // include("./../obj/clases.inc.php");
    
    // if(empty($_SESSION['user'])){
    //     header("Location: /index.php");
    //     exit();
    // }
    
    // if(isset($_POST['logOut'])){
    //     session_start();
    //     session_unset();
    //     session_destroy();
    //     header("Location: /index.php");
    //     exit();
    // }
    require_once("src/views/layouts/header.php");
    error_reporting(E_PARSE | E_ERROR);
?>
    <a href="index.php?accion=newuser" style="border:1px solid black; background:none; width:100px; height:25px;">Nuevo</a>
    <table>
        <tr>
            <td>email</td>
            <td>contrasenia</td>
            <td>accion</td>
        </tr>
        <tbody>

            <?php
                if(!empty($dataUser)):
                    foreach($dataUser as $value):
                        ?>

                        <tr>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['contrasenia'] ?></td>
                            <td><a href="index.php?accion=editar&email=<?$value['email']?>">Editar</a></td>
                            <td><a href="index.php?accion=eliminar&email=<?$value['email']?>">Eliminar</a></td>
                        </tr>

                        <?php
                    endforeach;
                    echo "<h1>".var_dump($value)."</h1>";
                else:
                    ?>

                    <tr>
                        <td colspan="3">NO HAY REGISTROS</td>
                    </tr>

                    <?php
                endif;
                ?>
        </tbody>
    </table>
<?
    require_once("src/views/layouts/footer.php");
?>