<?php
    include 'connection.php'; //para a ligação à base de dados

    include 'movie-select.php';
    include 'movie-insert-song.php';
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

                    <!-----------------------RESULTADOS - FILME----------------------->
                    <?php  include 'movie-resultados.php'; ?>

                    <!--------------------------INSERT MUSICAS-------------------------->
                    

                    <!--------------FORM - INSERT MUSICAS---------->
                    <div class="row center-xs">
                        <span class="text col-xs-12 text-danger"><?php echo $OuterError; ?><br></span>
                        <button class="grow btn-default  md-trigger" data-modal="modal-1">IS THERE A MISING SONG?</button>

                        <div class="md-modal-xs md-effect-1" id="modal-1">
                            <div class="md-content-xs">
                                <button class="md-close btn-default-fixed">Close me!</button>

                                <div>
                                    <form method="post">
                                        <div id="copy1" class="clone">
                                            <br>
                                            <br>
                                            <label for="text" class="test-song-label input-anim">
                                                <span class="label__info">Song</span>
                                                <input type="text" id="song" name="nome_musica" class="test-song " />
                                                <br>
                                            </label>

                                            <label for="text" class="input-anim test-genre-label">
                                                <span class="label__info">Genre</span>
                                                <input type="text" id="genre" name="genero" class="test-genre">
                                            </label>
                                            <br><br>
                                            <label class="input-anim" class="test-year-label">
                                                <span class="label__info">Year</span>
                                                <input type="number" id="year" max="3000" name="ano" class="test-year">
                                                <br>
                                                <span class="text"><?php echo $YearError; ?><br></span>
                                            </label>

                                            <label class="input-anim">
                                                <span class="label__info test-band-label">Singer/Band</span>
                                                <input type="text" class="test-band" id="band" name="cantor">
                                            </label>
                                            <br>
                                        </div>

                                        <div id="add-del-buttons">
                                            <input type="button" id="btnAddS" class="btn-default" value="1 MORE SONG">
                                            <input type="button" id="btnDelS" class="btn-default" value="REMOVE LAST SONG">
                                        </div>

                                        <br>
                                        <input type="submit" class="btn-default btn_add_song" value="ADD SONGS" name="addsong">

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </section>

            <?php  include 'modal-js.php'; ?>
        
    </body>

    </html>