<script>
    window.onload = getInfo();

    function getInfo() {
        var type = location.hash.substr(1);
        console.log(type);
    }
</script>

<!---- Acesso à base de bados --->
<?php

    $url = $_SERVER['REQUEST_URI'];

    $movieid = substr($url, -1);

    //echo $rest;
    
    include 'connection.php';
        
    //---------------------------------SELECT-------------------------------//

    $select_filme = "SELECT filme, image

    FROM filmes

    WHERE _id_filmes LIKE '$movieid'";

    $result_filme = $conn->query($select_filme);


    $select_filme_more = "SELECT data_lanc, realizador, classif, imdb_rating, ost_rating

    FROM filmes

    WHERE _id_filmes LIKE '$movieid'";

    $result_filme_more = $conn->query($select_filme_more);


    $select_atores = "SELECT nome_ator

    FROM filmes, filmes_atores, atores

    WHERE filmes._id_filmes = filmes_atores.filmes_id_filmes AND _id_ator = atores_id_ator

    AND _id_filmes LIKE '$movieid'";

    $result_atores = $conn->query($select_atores);


    $select_generos = "SELECT nome_genero

    FROM filmes, filmes_generos, generos

    WHERE filmes._id_filmes = filmes_generos.filmes_id_filmes AND _id_genero = generos_id_genero

    AND _id_filmes LIKE '$movieid'";

    $result_generos = $conn->query($select_generos);


    $select_musicas = "SELECT nome_musica, cantor

    FROM filmes, filmes_musicas, musicas

    WHERE filmes._id_filmes = filmes_musicas.filmes_id_filmes AND _id_musica = musicas_id_musica

    AND _id_filmes LIKE '$movieid'";

    $result_musicas = $conn->query($select_musicas);

    $nome_musica = $_POST["nome_musica"];       //o que foi escrito na música
    $genero_musica = $_POST["genero"];          //o que foi escrito no género
    $ano_musica = $_POST["ano"];                //o que foi escrito no ano
    $cantor = $_POST["cantor"];                 //o que foi escrito no cantor/banda

/*
    $insert_song = "INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)

    VALUES ('$id_musica', '$nome_musica', '$genero_musica', '$ano_musica', '$cantor', '0', 'user')";

    if ($conn->query($insert_song) == TRUE) {
        echo "New music inserted";
    }
    
    echo $id_musica;

    $insert_movie_song = "INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)
    
    VALUES ('$movieid', '$id_musica')";*/


?>

    <!DOCTYPE html>
    <html>

    <head>

        <!-- META TAGS -->
        <meta charset="UTF-8" />
        <title>Spotlight</title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
 <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="clone-song.js"></script>
         
    </head>


    <body>

        <?php include 'navbar.php'; ?>

            <section class="section-resized">


                <div class="row">

                    <div class="title col-xs-12 start-xs">
                        <p>

                            <?php 

                    //-----------------------RESULTADOS - NOME DO FILME e IMAGEM-----------------------//

                    if ($result_filme->num_rows > 0) {
                        while($row = $result_filme->fetch_assoc()) {

                            echo $row["filme"] . "</p>

                                </div>

                                    <div class ='col-sm-6 col-xs-12'>
                                        <a class ='nav__link center-xs menu-selected'>
                                        <img src = " . $row["image"] . " class ='logo'> </a>
                                    </div>";
                        }
                    }
                ?>

                                <div class="col-sm-6 col-xs-12">

                                    <p class="text text-left middle-xs">

                                        <?php 

                                //--------------RESULTADOS - INFO FILME e ATORES e GÉNERO----------------//

                                    while($row = $result_filme_more->fetch_assoc()) {

                                        echo "<b>Release date: </b>" . $row["data_lanc"] . "<br>";
                                        echo "<br><b>Age rating: </b>" . $row["classif"];
                                        echo "<br><b>Director: </b>" . $row["realizador"];
                                        echo "<br><b>IMDB rating: </b>" . $row["imdb_rating"] . "/10";
                                        echo "<br><b>OST rating: </b>" . $row["ost_rating"] . "/100" . "<br><br>";
                                    }

                                    echo "<b>Main actors: </b>";

                                    while($row = $result_atores->fetch_assoc()) {

                                        echo "<br>" . $row["nome_ator"];
                                    }

                                    echo "<br><br><b>Genres: </b>";

                                    while($row = $result_generos->fetch_assoc()) {

                                        echo "<br>" . $row["nome_genero"];
                                    }

                                ?>
                                    </p>
                                </div>

                    </div>

                    <div class="row center-xs start-md">
                        <div class="col-xs-12  ">

                            <div class="subtitle  center-xs start-sm">
                                <p>OFFICIAL SOUNDTRACK</p>
                            </div>
                        </div>
                        <?php 

                //--------------------------RESULTADOS - MUSICAS--------------------------//

                    while($row = $result_musicas->fetch_assoc()) {

                        echo " 
                                <div class='col-xs-6  '>
                                <p class='text text-left middle-xs'><b>Song: </b>" . $row["nome_musica"] . "
                                <br><b>Singer/Band: </b>" . $row["cantor"] . "</p>
                                </div>
                                 ";
                    }

                ?>



                    </div>
                </div>
                <!--------------MODAL---------->

                <div class="row center-xs">

                    <button class="grow btn-default  md-trigger" data-modal="modal-1">HELP US GROW</button>

                    <div class="md-modal-xs md-effect-1" id="modal-1">
                        <div class="md-content-xs">
                            <button class="md-close btn-default-fixed">Close me!</button>
                            <form action="#" method="post">
                                <div id="copy1" class="clone">


                                    <label for="text" class="test-text-label input-anim">
                                        <span class="label__info">Song</span>
                                        <input type="text" id="text" name="nome_musica" class="test-text " />
                                        <br>
                                    </label>

                                    <label for="text" class="test-text-label input-anim">
                                        <span class="label__info">Genre</span>
                                        <input type="text" id="text" name="genero" class="test-text " />
                                        <br>
                                    </label>

                                    <label for="text" class="test-text-label input-anim">
                                        <span class="label__info">Year</span>
                                        <input type="text" id="text" pattern="\d*" maxlength="4" class="test-text " />
                                        <br>
                                    </label>
                                    
                                      <label for="text" class="test-text-label input-anim">
                                        <span class="label__info">Singer/Band</span>
                                        <input type="text" id="text"   name="cantor" class="test-text " />
                                        <br>
                                    </label>
                                     
                                    
 
                                   <!-- <br>
                                    <input type="submit" value="Add song">-->
                            </form>
                            </div>
                         
                    </div>

                </div>

           
           
            </section>

            <div class="md-overlay"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
            <script type="text/javascript" src="assets/js/classie.js"></script>
            <script type="text/javascript" src="assets/js/modalEffects.js"></script>
            <script src="assets/js/cssParser.js"></script>

            <!-- jQuery -->
            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

            <script src="assets/js/script-movie.js"></script>



            <script>
                $(".grow").click(function () {

                    $(".md-overlay").css("visibility", "visible");
                    $(".md-overlay").css("opacity", "1");

                });

                $(".md-close").click(function () {

                    $(".md-overlay").css("visibility", "hidden");
                    $(".md-overlay").css("opacity", "0");

                });
            </script>

    </body>


    </html>