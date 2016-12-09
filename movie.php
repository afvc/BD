<!---- Acesso à base de bados --->
<?php 
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "spotlight"; // Pasta do sql
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully" . "<br>";

    //Impressão dos dados da BD no html
    $sql = "SELECT * FROM filmes";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) {
    // output data of each row
        
    
        while($row = $result->fetch_assoc()) {
            $movie = $row["filme"];

            $var = $row["data_lanc"] . "<br>" . "Director: " . $row["realizador"] . "<br><br>" . "Age rating: " . $row["classif"] . "<br><br>" . "IMDB rating: " . $row["imdb_rating"] . "/10" . "<br>" . "OST rating: " . $row["ost_rating"]  . "/100". "<br>";
        }
        

    } else {
        echo "0 results"; 
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

                <div class="subtitle col-xs-12  start-xs">
                    <?php echo $movie; ?>

                </div>

                <ul class="  nav__list col-xs-12  subtitle">

                    <li>
                        <div class="row center-xs start-md middle-xs">
                            <div class="col-sm-6 col-xs-12">


                                <a class="nav__link center-xs" href="#" class="menu-selected"> <img src="assets/images/p1.jpg" class="logo"> </a>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <p class="text text-left middle-xs">
                                    <?php echo $var; ?>
                                        <br>Main actors

                                        <!--
                                        <br>Bacon ipsum dolor amet meatball tail picanha cupim shoulder, chicken ball tip bresaola meatloaf sausage jerky pork chop hamburger t-bone. Bacon meatball hamburger short ribs drumstick ball tip fatback andouille, brisket bresaola. Venison jerky ground round drumstick, sirloin sausage swine burgdoggen. Picanha ribeye bacon, cow tri-tip strip steak turducken burgdoggen pork loin ham meatball spare ribs shankle. Picanha boudin tongue turkey sausage, jerky biltong capicola kevin landjaeger bacon beef prosciutto frankfurter venison.
                                        -->
                                </p>
                                <br>
                                <br>

                            </div>
                        </div>
                    </li>


                </ul>
            </div>
            <div class="row center-xs start-md">
                <div class="col-xs-12 col-sm-6 order-xs-1st">



                    <ul>
                        <div class="subtitle  center-xs start-sm">
                            <p>OFICIAL SOUNDTRACK</p>
                        </div>
                        <li>
                            <div class="row center-xs start-md">
                                <div class="col-xs-12 col-sm-7 ">
                                    <!--
                                <a class="nav__link start-xs" href="#" class="menu-selected"> <img src="assets/images/p1.jpg" class="logo"> </a>
                                -->
                                </div>
                                <div class="col-xs-12 col-sm-7 ">
                                    <p class="text text-left middle-xs">
                                        <br>Song
                                        <br>Singer / Band </p>

                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="row center-xs start-md">
                                <div class="col-xs-12 col-sm-7">
                                    <!--
                                <a class="nav__link start-xs" href="#" class="menu-selected"> <img src="assets/images/p1.jpg" class="logo"> </a>
                                -->
                                </div>
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
                                    <!--
                                <a class="nav__link start-xs" href="#" class="menu-selected"> <img src="assets/images/p1.jpg" class="logo"> </a>
                                -->
                                </div>
                                <div class="col-xs-12 col-sm-7 ">
                                    <p class="text text-left middle-xs">
                                        <br>Song
                                        <br>Singer / Band </p>

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

    </body>


    </html>