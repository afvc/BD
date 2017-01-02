<?php
    include 'connection.php'; //para a ligação à base de dados


    $url = $_SERVER['REQUEST_URI']; //vai buscar URL

    $movieid = substr($url, strrpos($url, '=') + 1); //vai buscar ao URL o id do filme (caracteres depois do =)


    include 'movie-insert-song.php';
    include 'movie-select.php';
?>

    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">
        
        <!--título da página é o nome do filme-->
        <title>
            <?php

                $row = $result_filme_title->fetch_assoc();

                echo $row["filme"];

            ?>
        </title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        
        <script src="assets/js/clone-insert-song.js"></script>

    </head>


    <body>

        <?php include 'navbar.php'; ?>

            <section class="section-resized">

                <div class="row">

                    <!----------- RESULTADOS - FILME---------->
                    <?php  include 'movie-resultados.php'; ?>

                    <!--------------------------INSERT MUSICAS-------------------------->
                    

                    <!--------------FORM - INSERT MUSICAS---------->
                    
                    <?php include 'movie-insert-song-form.php';?>

                </div>

            </section>

            <?php  include 'modal-js.php'; ?>
        
    </body>

    </html>