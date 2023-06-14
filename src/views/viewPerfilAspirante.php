<?php
    require_once("layouts/header.php");
?>
<section id="container-perfil-aspirante" class="v2container-view-aspirante">
    <article class="box-perfil-intro">
        <div class="box-image-perfil">
            <img src="../img/perfil.jpeg" alt='Nada'>
        </div>
        <section class="target-info-perfil">
            <form action="#" method="post">
                <label>Nombre Usuario</label>
                <input type="text" name="nameUser" placeholder="<?php echo $_SESSION['nombreUsuario']?>">
                <label>Email Usuario</label>
                <input type="email" name="emailUser" placeholder="<?php echo $_SESSION['emailUsuario']?>">
            </form>
            <article class="target-cursos-perfil">
                <h4>NOTAS:</h4>
                <div class="box-notas-cursos">
                    <h4>Asignatura 1: 500/1000</h4>
                    <h4>Asignatura 2: 500/1000</h4>
                    <h4>Asignatura 3: 500/1000</h4>
                    <h4>Asignatura 4: 500/1000</h4>
                    <h4>Asignatura 5: 500/1000</h4>
                </div>
            </article>
        </section>
    </article>
    <article class="box-elements-aspirante">
        <section>
            <article class="calendario-curso">
                    <table class="calendario">
                        <tr>
                            <td colspan='7'>
                                <input type='text' placeholder='Enero'class="calendar-month" />
                            </td>
                        </tr>
                        <tr>
                            <td>L</td>
                            <td>M</td>
                            <td>W</td>
                            <td>J</td>
                            <td>V</td>
                            <td>So</td>
                            <td>D</td>
                        </tr>
                        <?php
                                    $column=1;
                                    while($column < 31){
                                        echo "<tr>\n";
                                        for ($week=0; $week < 7; $week++) { 
                                            echo "<td>$column</td>\n";
                                            if($column == 31){
                                                break;
                                            }else {
                                                $column++;
                                            }
                                        }
                                        echo "</tr>\n";
                                    }
                        ?>
                        </table>
            </article>
            <article class="column-cursos">
                <input type="text" name="busquedaCursos" />
                <div class="box-cursos">
                    <div class="curso">
                        <img src="../img/curso1.jpeg" alt="">
                        <h5>Curso1</h5>
                    </div>
                    <div class="curso">
                        <img src="../img/curso2.jpeg" alt="">
                        <h5>Curso2</h5>
                    </div>
                    <div class="curso">
                        <img src="../img/curso3.jpeg" alt="">
                        <h5>Curso3</h5>
                    </div>
                    <div class="curso">
                        <img src="../img/curso1.jpeg" alt="">
                        <h5>Curso4</h5>
                    </div>
                </div>
            </article>
        </section>
    </article>
</section>