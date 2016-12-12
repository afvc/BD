<!---- Acesso à base de bados --->
<?php

    include 'connection.php';  

    //---------------------------------SELECT-------------------------------//


    $select_filme = "SELECT filme, image

    FROM filmes

    WHERE _id_filmes LIKE '1'";

    $result_filme = $conn->query($select_filme);


    $select_filme_more = "SELECT data_lanc, realizador, classif, imdb_rating, ost_rating

    FROM filmes

    WHERE _id_filmes LIKE '1'";

    $result_filme_more = $conn->query($select_filme_more);


    $select_atores = "SELECT nome_ator

    FROM filmes, filmes_atores, atores

    WHERE filmes._id_filmes = filmes_atores.filmes_id_filmes AND _id_ator = atores_id_ator

    AND _id_filmes LIKE '1'";

    $result_atores = $conn->query($select_atores);


    $select_generos = "SELECT nome_genero

    FROM filmes, filmes_generos, generos

    WHERE filmes._id_filmes = filmes_generos.filmes_id_filmes AND _id_genero = generos_id_genero AND 

    AND _id_filmes LIKE '1'";

    $result_generos = $conn->query($select_generos);


    $select_musicas = "SELECT nome_musica, cantor

    FROM filmes, filmes_musicas, musicas

    WHERE filmes._id_filmes = filmes_musicas.filmes_id_filmes AND _id_musica = musicas_id_musica

    AND _id_filmes LIKE '1'";

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

                    <!-----------------------NOME DO FILME----------------------->

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

                <div class="subtitle col-xs-12  start-xs">

                    <?php 
                    
                    //-------------------------------RESULTADOS-----------------------------//

                        if ($result_filme->num_rows > 0) {
                            while($row = $result_filme->fetch_assoc()) {

                                echo "<p>" . $row["filme"] . "</p>
                                
                                    </div>
                                        <ul class = " . "nav__list col-xs-12 subtitle" . ">

                                        <li>
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
                    
                                    //-------------------------------RESULTADOS-----------------------------//

                                        while($row = $result_filme_more->fetch_assoc()) {

                                            echo $row["data_lanc"] . "<br>";
                                            echo "<br><b>Age rating: </b>" . $row["classif"];
                                            echo "<br><b>Director: </b>" . $row["realizador"];
                                            echo "<br><b>IMDB rating: </b>" . $row["imdb_rating"] . "/10";
                                            echo "<br><b>OST rating: </b>" . $row["ost_rating"] . "/100" . "<br><br>";
                                        }
                                    
                                        echo "<b>Main actors: </b>";
                                        
                                        while($row = $result_atores->fetch_assoc()) {

                                            echo "<br>" . $row["nome_ator"];
                                        }
                                
                                        //GENERO!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

                                    ?>
                            </p>
                        </div>
                </div>
                </li>

                </ul>
            </div>
        
            <div class="row center-xs start-md">
                <div class="col-xs-12 col-sm-6 order-xs-1st">

                    <ul>
                        <div class="subtitle  center-xs start-sm">
                            <p>OFFICIAL SOUNDTRACK</p>
                        </div>

                        <li>
                            <div class="row center-xs start-md">
                                <div class="col-xs-12 col-sm-7 ">
                                    <p class="text text-left middle-xs">
                                        <br>Song
                                        <br>Singer / Band </p>

                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row center-xs start-md">
                                <div class="col-xs-12 col-sm-7 ">
                                    <p class="text text-left middle-xs">
                                        <br>Song
                                        <br>Singer / Band </p>

                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row center-xs start-md">
                                <div class="col-xs-12 col-sm-7 ">
                                    <p class="text text-left middle-xs">
                                        <br>Song
                                        <br>Singer/Band </p>

                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="col-xs-12 col-sm-6 order-xs-2nd padding-big">

                    <ul>
                        <div class="subtitle center-xs start-sm">
                            <p>EXCLUSIVE POSTERS</p>
                        </div>
                        <li>
                            <div class="row center-xs start-md">
                                <div class="col-xs-12 ">


                                    <a class="nav__link start-xs" href="#" class="menu-selected"> <img src="assets/images/p1.jpg" class="logo-m">

                                        <p class="text ">Caption</p>
                                    </a>

                                </div>
                            </div>
                        </li>

                    </ul>

                </div>

            </div>

            <!--------------MODAL---------->

            <div class="row">


                <button class="btn-default  md-trigger" data-modal="modal-1">HELP US GROW</button>

                <div class="md-modal-xs md-effect-1" id="modal-1">
                    <div class="md-content-xs">
                        <button class="md-close btn-default">Close me!</button>

                        <div>
                            <form action="demo_form.asp">
                                <label class="input-anim" for="">
                                    <span class="label__info">  Movie Name </span>
                                    <input class="input-anim" type="text" name="movie">
                                    <br> </label>

                                <label class="input-anim" for="">
                                    <span class="label__info"> Year </span>
                                    <input type="text" name="year">
                                    <br>
                                </label>

                                <label class="input-anim" for="">
                                    <span class="label__info">  Genre </span>
                                    <input type="text" name="genre">
                                    <br>
                                </label>
                                <label class="input-anim" for="">
                                    <span class="label__info"> Producer </span>
                                    <input type="text" name="producer">
                                    <br>
                                </label>
                                <label class="input-anim" for="">
                                    <span class="label__info">  Age Rating </span>
                                    <input type="text" name="agerating">
                                    <br>
                                </label>

                                <label class="input-anim" for="">
                                    <span class="label__info">  IMDB Rating </span>
                                    <input type="text" name="imdb">
                                    <br>
                                </label>

                                <label class="input-anim" for="">
                                    <span class="label__info">  OST Rating </span>
                                    <input type="text" name="ost">
                                    <br>
                                </label>


                                <label class="input-anim" for="">
                                    <span class="label__info">  Singer/Band </span>
                                    <input type="text" name="ost">
                                    <br>
                                </label>


                                <label class="input-anim" for="">
                                    <span class="label__info">  Song </span>
                                    <input type="text" name="ost">
                                    <br>
                                </label>
                                <br>
                                <input type="submit" class=" btn-default" value="Submit">
                            </form>

                        </div>

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

    </body>


    </html>