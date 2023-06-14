<?php
    require_once("layouts/header.php");
    require_once("layouts/container.php");
    $curriculum = new Curriculum();
    $result = $curriculum -> getSelectCurriculums();
?>
<section class="container-vistas-aspirante">
    <?php
        foreach($result as $clave => $rows){
            ?>
                <article class="box-content-curriculum">
                    <ul>
                        <li><?php echo $rows['nombreUser'] ?></li>
                        <li><?php echo $rows['email'] ?></li>
                    </ul>
                </article>
            <?php
        }
    ?>
</section>
<?php
    require_once("layouts/footer.php");