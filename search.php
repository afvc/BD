<?php

    $option = $_POST["option"];
    $filters = $_POST["filters"];
        
    include 'connection.php';  

    $contador = 0;

    //$sql = "SELECT filme FROM filmes WHERE $filters LIKE '%$option%'";

  $sql = "SELECT filme, nome_ator, nome_genero, nome_musica, cantor
    
    FROM filmes, filmes_atores, atores, filmes_generos, generos, filmes_musicas, musicas
    
    WHERE filmes._id_filmes = filmes_atores.filmes_id_filmes AND _id_ator = atores_id_ator AND 
    
    filmes._id_filmes = filmes_generos.filmes_id_filmes AND _id_genero = generos_id_genero AND 
    
    filmes._id_filmes = filmes_musicas.filmes_id_filmes AND _id_musica = musicas_id_musica
    
    AND $filters LIKE '%$option%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
        while($row = $result->fetch_assoc()) {

            $filme[$contador] = array("movie"=>$row["filme"], "agerating"=>$row["classif"], "releasedate"=>$row["data_lanc"], "data_lanc"=>$row["realizador"], "imdb_rat"=>$row["imdb_rat"], "ost_rating"=>$row["ost_rating"]);
            
            $ator[$contador] = array("ator"=>$row["nome_ator"]);

            $genero[$contador] = array("genero"=>$row["nome_genero"]);

            $musica[$contador] = array("song"=>$row["nome_musica"], "singer"=>$row["cantor"]);
            
            $contador++;
        }

    }

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
                            <li><a class="nav__link start-xs" href="tops.php">TOPS </a></li>
                            <li><a class="nav__link start-xs" href="slist.php">SONG LIST</a></li>
                            <li><a class="nav__link start-xs" href="search.php">SEARCH</a></li>

                        </label>
                    </ul>
                </div>
            </aside>
        </div>

        <section class="section-resized">


            <div class="row">

                <div class=" col-xs-12 subtitle start-xs">
                    <p>SEARCH</p>

                </div>
            </div>


            <div class="row">

                <div class="col-xs-12 start-xs">

                    <form method="post">

                        <label for="filters">FILTER</label>
                        <select id="filter" name="filters">
                            <option name="filters" value="filme" selected>Movie Name</option>
                            <option name="filters" value="classif">Age rating</option>
                            <option name="filters" value="realizador">Director</option>
                            <option name="filters" value="nome_ator">Actor</option>
                            <option name="filters" value="nome_genero">Genre</option>
                            <option name="filters" value="nome_musica">Song</option>
                            <option name="filters" value="cantor">Singer/Band</option>
                            <option name="filters" value="imdb_rating">Imdb Rating</option>
                            <option name="filters" value="ost_rating">OST Rating</option>
                        </select>

                        <br> Your Option:
                        <input type="text" name="option">
                        <br>
                        <input type="submit">
                    </form>

                </div>

                <div class="col-xs-12 start-xs">Results:

                    <!--#1-->

                    <div class="row center-xs start-md">
                        <div class="col-xs-4 col-sm-2">
                            <a class="nav__link center-xs" href="movie.php" class="menu-selected"><img src="assets/images/p1.jpg" class="logo"> </a>
                        </div>

                        <div class="col-xs-6 ">
                            <p class="text text-left middle-xs">

                                <?php
                                    if (!$result->num_rows > 0) {
                                    echo "0 results "; 
                                    }
                                
                                    echo "<br>" . $_POST["filters"] . "<br>";
                                    echo $_POST["option"];
                                ?>

                                    <?php echo $var; ?>

                                        <div class="dbresult"></div>


                                        <br>Main actors
                                        <br>Ratings </p>
                        </div>
                    </div>

                    <!--#2-->

                    <div class="row center-xs start-md">
                        <div class="col-xs-4 col-sm-2">
                            <a class="nav__link center-xs" href="movie.php" class="menu-selected"><img src="assets/images/p1.jpg" class="logo"> </a>
                        </div>

                        <div class="col-xs-6 ">
                            <p class="text text-left middle-xs">
                                <br>Title, year
                                <br>Producers
                                <br>Main actors
                                <br>Ratings </p>
                        </div>
                    </div>

                </div>

            </div>

            <!--   ------------MODAL--------     -->

            <div class="row">

                <button class="btn-default  md-trigger" data-modal="modal-1">HELP US GROW</button>

                <div class="md-modal-xs md-effect-1" id="modal-1">
                    <div class="md-content-xs">
                        <button class="md-close btn-default">Close me!</button>
<!--
                        <div>
                            <form action="demo_form.asp">
                                <label class="input-anim" for="">
                                    <span class="label__info">  Movie Name </span>
                                    <input class="input-anim" type="text" name="movie">
                                    <br> </label>

                                <label class="input-anim" for="">
                                    <span class="label__info"> Release date </span>
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
-->

                    </div>
                </div>
            </div>

            <div class="col-xs-12 end-xs">
                <br>
                <br>
                <br> <a href="mailto:someone@example.com?Subject=Hello%20again" target="_top">CONTACT US</a>

            </div>

        </section>

        <div class="md-overlay"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
        <script type="text/javascript" src="assets/js/classie.js"></script>
        <script type="text/javascript" src="assets/js/modalEffects.js"></script>
        <script src="assets/js/cssParser.js"></script>

        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

        <script type="text/javascript" language="javascript">

            for (i = 0; i < 20; i++) {
                console.log("teste" + i);
                var show_filme = <?php echo json_encode($filme); ?>;
                $('.dbresult').append("Filme " + i + ": " + show_filme[i].movie + "<br>");
//                $('.dbresult').append("Realizador " + i + ": " + palmas[i].director + "<br>");
                
/*                var show_ator = <?php echo json_encode($ator); ?>;
                $('.dbresult').append("Ator " + i + ": " + show_ator[i].ator + "<br>");
                
                var show_genero = <?php echo json_encode($genero); ?>;
                $('.dbresult').append("Género " + i + ": " + show_genero[i].genero + "<br>");
                
                var show_musica = <?php echo json_encode($musica); ?>;
                $('.dbresult').append("Música " + i + ": " + show_musica[i].song + "<br><br>");
*/
            }
            
        </script>
    </body>

    </html>