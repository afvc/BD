 
<?php
include 'select-movie.php';
?>

    <!DOCTYPE html>
    <html>

    <head>

        <!-- META TAGS -->
        <meta charset="UTF-8" />
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
        <script src="clone-song.js"></script>

    </head>


    <body>

        <?php include 'navbar.php'; ?>

            <section class="section-resized">

                <div class="row">

                    <div class="title col-xs-12 start-xs">

                      <!--   //-----------------------RESULTADOS - FILME-----------------------//-->
                      
                       <?php  include 'resultados-movie.php'; ?>
                      
                <!--//--------------------------INSERT MUSICAS--------------------------//-->
                <?php  include 'insert-song.php'; ?>
                
                <!--------------MODAL---------->

                <div class="row center-xs">

                    <button class="grow btn-default  md-trigger" data-modal="modal-1">IS THERE A MISING SONG?</button>

                    <div class="md-modal-xs md-effect-1" id="modal-1">
                        <div class="md-content-xs">
                            <button class="md-close btn-default-fixed">Close me!</button>

                            <div>
                                <form method="post">
                                    <div id="copy1" class="clone">
                                        <br>
                                        <br>
                                        <label for="text" class="test-text-label input-anim">
                                            <span class="label__info">Song</span>
                                            <input type="text" id="text" name="nome_musica" class="test-text " />
                                            <br>
                                        </label>

                                        <label class="input-anim">
                                            <span class="label__info">Genre</span>
                                            <input type="text" name="genero">
                                        </label>
                                        <br>
                                        <label class="input-anim">
                                            <span class="label__info">Year</span>
                                            <input type="text" pattern="\d*" maxlength="4" name="ano">
                                        </label>
                                        <br>

                                        <label class="input-anim">
                                            <span class="label__info">Singer/Band</span>
                                            <input type="text" name="cantor">
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