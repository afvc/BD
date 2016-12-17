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


    </head>


    <body>

        <!------------#NAVBAR_BIG------------>
        <div class="smalltext nav-big">

            <nav class="navbar">
                <div class="row middle-xs full-height">

                    <ul class="smalltext col-xs-8 end-xs  col-sm-10 col-lg-10 text-bold">

                        <li class="navbar__link"><a href="index.php" class="menu-selected">HOME</a></li>
                        <li class="navbar__link"><a href="tops.php">TOPS</a></li>
                        <li class="navbar__link"><a href="slist.php">SONG LIST</a></li>
                        <li class="navbar__link"> <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">CONTACT US</a></li>
                        <li class="navbar__link"><a href="search.php">SEARCH</a></li>

                    </ul>

                </div>
            </nav>
        </div>


        <!------------#NAVBAR_SMALL------------>

        <div class="nav-small text-bold">

            <input type="checkbox" id="nav-trigger" class="nav-controller" />

            <header class="header-bar">
                <label class="" for="nav-trigger" tabindex="-1">
                    <div class="button--icon-container">
                        <span class="icon icon--hamburger"></span>
                    </div>
                </label>

            </header>

            <aside class="nav">
                <label class="overlay" for="nav-trigger"></label>
                <div class="nav__body">


                    <ul class="  nav__list col-xs-12 subtitle">
                        <label class="nav__item" for="nav-trigger">

                            <li><a class="nav__link start-xs" href="index.php" class="menu-selected">HOME</a></li>
                            <li><a class="nav__link start-xs" href="tops.php">TOPS</a></li>
                            <li><a class="nav__link start-xs" href="slist.php">SONG LIST</a></li>
                            <li><a class="nav__link start-xs" href="mailto:someone@example.com?Subject=Hello%20again" target="_top">CONTACT US</a></li>
                            <li><a class="nav__link start-xs" href="search.php">SEARCH</a></li>

                        </label>
                    </ul>
                </div>
            </aside>
        </div>

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
                                    <div class = " . "row center-xs start-md middle-xs" . ">
                                        <div class= " . "col-sm-6 col-xs-12" . ">
                                            <a class = " . "nav__link center-xs menu-selected" . ">
                                            <img src = " . $row["image"] . " class = " . "logo" . "> </a>
                                        </div>";
                            }
                        }
                    ?>

                            <div class="col-sm-6 col-xs-12">

                                <p class="text text-left middle-xs">

                                    <?php 
                    
                                    //--------------RESULTADOS - INFO FILME e ATORES e GÉNERO----------------//

                                        while($row = $result_filme_more->fetch_assoc()) {

                                            echo "<br><b>Release date: </b>" . $row["data_lanc"] . "<br>";
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

            </div>

            <div class="row center-xs start-md">
                <div class="col-xs-12 col-sm-6 order-xs-1st">

                    <div class="subtitle  center-xs start-sm">
                        <p>OFFICIAL SOUNDTRACK</p>
                    </div>
                    <?php 

                    //--------------------------RESULTADOS - MUSICAS--------------------------//

                        while($row = $result_musicas->fetch_assoc()) {

                            echo "<div class=" . "row center-xs start-md" . ">
                                    <div class=" . "col-xs-12 col-sm-7" . ">
                                    <p class=" . "text text-left middle-xs" ."><b>Song: </b>" . $row["nome_musica"] . "
                                    <br><b>Singer/Band: </b>" . $row["cantor"] . "</p>
                                    </div>
                                    </div>";
                        }

                    ?>

                </div>

            </div>

            <!--------------MODAL---------->

            <div class="row">

                <button class="btn-default  md-trigger" data-modal="modal-1">HELP US GROW</button>

                <div class="md-modal-xs md-effect-1" id="modal-1">
                    <div class="md-content-xs">
                        <button class="md-close btn-default">Close me!</button>

                        <div>
                            <!--  <form action="demo_form.asp">  -->

                            <form method="post">
                                <label name="filters" class="input-anim" for="">
                                    <span class="label__info" value="nome_musica">Song</span>
                                    <input type="text" name="option">
                                    <br>
                                </label>

                                <label name="filters" class="input-anim" for="">
                                    <span class="label__info" value="cantor">Singer/Band</span>
                                    <input type="text" name="option">
                                    <br>
                                </label>

                                <br>
                                <input type="submit" class=" btn-default" value="Submit">
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                    
                    $filters = $_POST["filters"];   //o filtro usado
                    $option = $_POST["option"];     //o que foi escrito no filtro

                    /* $max = "SELECT MAX(_id_musica) FROM musicas"; */

                    $insert = "INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)

                    VALUES ('20', 'musica', NULL, NULL, 'cantor', '0', 'user')";
                    
                    if ($conn->query($insert) === TRUE) {
                        echo "New music inserted";
                    }

                    
                ?>

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

    </body>


    </html>