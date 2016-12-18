<!---- Acesso à base de bados --->
<?php

    include 'connection.php';  

    //----------------------SELECT FILME------------------------//

    $select_filme_imdb = "SELECT _id_filmes, filme, image, data_lanc, realizador, imdb_rating, ost_rating

    FROM filmes
    
    ORDER BY imdb_rating DESC";
    
    $result_filme_imbd = $conn->query($select_filme_imdb);


    $select_filme_rating = "SELECT _id_filmes, filme, image, data_lanc, realizador, imdb_rating, ost_rating

    FROM filmes";
    
    $result_filme_rating = $conn->query($select_filme_rating);


    $select_filme_ost = "SELECT _id_filmes, filme, image, data_lanc, realizador, imdb_rating, ost_rating

    FROM filmes
    
    ORDER BY ost_rating DESC";
    
    $result_filme_ost = $conn->query($select_filme_ost);

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

                <div class="subtitle start-xs">
                    <p>IMDB RATING TOP 25 MOVIES</p>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 start-xs">

                    <?php
                        $numrows_imdb = 0;

                        if ($result_filme_imbd->num_rows > 0) {

                            echo "<div class='row start-md'>";

                                while(($row = $result_filme_imbd->fetch_assoc()) && ($numrows_imdb < 2)) {

                                $numrows_imdb++;

                                echo "<div class='col-xs-5 col-sm-2'>
                                        <div><b> #$numrows_imdb </b></div>
                                        <a class='nav__link center-xs' href=" . "movie.php?movieid=" . $row["_id_filmes"] . "><img src=" . $row["image"] . " class=" ." logo" . "> </a>                            </div>
                                        <div class='col-xs-7 col-sm-4'>
                                                <p class='subtitle text-left middle-xs'>" . $row["filme"] . "</p>" .
                                                "<p class='text text-left middle-xs'>
                                                    <b>Release date: </b>" . $row["data_lanc"] .
                                                    "<br><b>Director: </b>" . $row["realizador"] . "
                                                    <br><b>IMDB Rating: </b>" . $row["imdb_rating"] . "/10
                                                    <br><b>OST Rating: </b>" . $row["ost_rating"] . "/100
                                                </p>
                                            </div><br>";

                            }
                        }

                    ?>

                </div>

            </div>

            <div class="end-xs col-xs-12">
                <a href="tops-imdb.php">
                    <button class="btn-modal">SHOW MORE</button>
                </a>
            </div>
            </div>

            <div class="row">

                <div class="subtitle start-xs">
                    <p>MOST POPULAR MOVIES AROUND HERE</p>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 start-xs">

                    <?php
                        $numrows_rating = 0;

                        if ($result_filme_rating->num_rows > 0) {

                            echo "<div class='row start-md'>";

                                while(($row = $result_filme_rating->fetch_assoc()) && ($numrows_rating < 2)) {

                                $numrows_rating++;

                                echo "<div class='col-xs-5 col-sm-2'>
                                        <div><b> #$numrows_rating </b></div>
                                        <a class='nav__link center-xs' href=" . "movie.php?movieid=" . $row["_id_filmes"] . "><img src=" . $row["image"] . " class=" ." logo" . "> </a>                            </div>
                                        <div class='col-xs-7 col-sm-4'>
                                                <p class='subtitle text-left middle-xs'>" . $row["filme"] . "</p>" .
                                                "<p class='text text-left middle-xs'>
                                                    <b>Release date: </b>" . $row["data_lanc"] .
                                                    "<br><b>Director: </b>" . $row["realizador"] . "
                                                    <br><b>IMDB Rating: </b>" . $row["imdb_rating"] . "/10
                                                    <br><b>OST Rating: </b>" . $row["ost_rating"] . "/100
                                                </p>
                                            </div><br>";

                            }
                        }

                    ?>

                </div>

            </div>

            <div class="end-xs col-xs-12">
                <a href="tops-site.php">
                    <button class="btn-modal">SHOW MORE</button>
                </a>
            </div>
            </div>

            <div class="row">

                <div class="subtitle start-xs">
                    <p>TOP 25 BEST OST</p>
                </div>
            </div>

            <div class="row">

                <div class="col-xs-12 start-xs">

                    <?php
                        $numrows_ost = 0;

                        if ($result_filme_ost->num_rows > 0) {

                            echo "<div class='row start-md'>";

                                while(($row = $result_filme_ost->fetch_assoc()) && ($numrows_ost < 2)) {

                                $numrows_ost++;

                                echo "<div class='col-xs-5 col-sm-2'>
                                        <div><b> #$numrows_ost </b></div>
                                        <a class='nav__link center-xs' href=" . "movie.php?movieid=" . $row["_id_filmes"] . "><img src=" . $row["image"] . " class=" ." logo" . "> </a>                            </div>
                                        <div class='col-xs-7 col-sm-4'>
                                                <p class='subtitle text-left middle-xs'>" . $row["filme"] . "</p>" .
                                                "<p class='text text-left middle-xs'>
                                                    <b>Release date: </b>" . $row["data_lanc"] .
                                                    "<br><b>Director: </b>" . $row["realizador"] . "
                                                    <br><b>IMDB Rating: </b>" . $row["imdb_rating"] . "/10
                                                    <br><b>OST Rating: </b>" . $row["ost_rating"] . "/100
                                                </p>
                                            </div><br>";

                            }
                        }

                    ?>

                </div>

            </div>

            <div class="end-xs col-xs-12">
                <a href="tops-OST.php">
                    <button class="btn-modal">SHOW MORE</button>
                </a>
            </div>

            </div>

        </section>

        <div class="md-overlay"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js"></script>
        <script type="text/javascript" src="assets/js/classie.js"></script>
        <script type="text/javascript" src="assets/js/modalEffects.js"></script>
        <script src="assets/js/cssParser.js"></script>

    </body>

    </html>