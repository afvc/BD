<!---- Acesso à base de bados --->
<?php

    $option = $_POST["option"];
    $filters = $_POST["filters"];
        
    include 'connection.php';  

    $contador = 0;

    //Impressão dos dados da BD no html
    //$sql = "SELECT * FROM filmes, filmes_atores, atores WHERE $filters LIKE '%$option%'";
    $sql = "SELECT * FROM filmes, atores, musicas WHERE $filters LIKE '%$option%'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    
        while($row = $result->fetch_assoc()) {

/*            $movie = $row["filme"];
*/
           /* $var = $row["data_lanc"] . "<br>" . "Director: " . $row["realizador"] . "<br><br>" . "Age rating: " . $row["classif"] . "<br><br>" . "IMDB rating: " . $row["imdb_rating"] . "/10" . "<br>" . "OST rating: " . $row["ost_rating"]  . "/100". "<br>";
            */
            
            $cenas[$contador] = array("movie"=>$row["filme"], "director"=>$row["realizador"], "nome_ator"=>$row["nome_ator"], "song"=>$row["_nome_musica"]); //mostra linhas da col 'filme'
            
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
                            <option name="filters" value="_nome_genero">Genre</option>
                            <option name="filters" value="_nome_musica">Song</option>
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

            for (i = 0; i < 8; i++) {
                console.log("teste" + i);
                var palmas = <?php echo json_encode($cenas); ?>;
                $('.dbresult').append("Filme " + i + ": " + palmas[i].movie + "<br>");
                $('.dbresult').append("Realizador " + i + ": " + palmas[i].director + "<br>");
                $('.dbresult').append("Ator " + i + ": " + palmas[i].nome_ator + "<br>");
                $('.dbresult').append("Música " + i + ": " + palmas[i].song + "<br><br>");

            }
            
        </script>
    </body>

    </html>