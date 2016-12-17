<!---- Acesso à base de bados --->
<?php

    include 'connection.php';  

    //----------------------SELECT FILME------------------------//

    $select_filme = "SELECT _id_filmes, filme, data_lanc, realizador, image

    FROM filmes";
    
    $result_filme = $conn->query($select_filme);

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
                <p>MOST POPULAR MOVIES AROUND HERE</p>
            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 start-xs">

                <?php

                $numrows = 0;

                if ($result_filme->num_rows > 0) {

                    while($row = $result_filme->fetch_assoc()) {

                        $num_rows++;

                        echo "
                            <div class=" . "row center-xs start-md" . ">
                                <div class=" . "col-xs-3 col-sm-2" . ">
                                <div> # $num_rows </div>
                                    <a class=" . "nav__link center-xs" . " href=" . "movie.php?movieid=" . $row["_id_filmes"] . "><img src=" . $row["image"] . " class=" ." logo" . "> </a>
                                </div>
                                <div class=" . "col-xs-6" . ">
                                    <p class=" . "subtitle text-left middle-xs" .">
                                    <br>" . $row["filme"] . "</p>" .
                                    "<p class=" . "text text-left middle-xs> <b>Release date: </b>" . $row["data_lanc"] .
                                    "<br><b>Director: </b>" . $row["realizador"] . "</p>
                                </div>
                            </div><br>";  
                    }
                }

            ?>

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