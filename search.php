<!---- Acesso à base de bados --->
<?php

    //para usar nos selects
    $filters = $_POST["filters"];   //o filtro usado
    $option = $_POST["option"];     //o que foi escrito no filtro
  
    
    include 'connection.php';  

    //----------------------SELECT FILME------------------------//

    $select_filme = "SELECT DISTINCT _id_filmes, filme, image, data_lanc, realizador, imdb_rating, ost_rating

    FROM filmes, filmes_atores, atores, filmes_generos, generos, filmes_musicas, musicas

    WHERE filmes._id_filmes = filmes_atores.filmes_id_filmes AND _id_ator = atores_id_ator AND 

    filmes._id_filmes = filmes_generos.filmes_id_filmes AND _id_genero = generos_id_genero AND 

    filmes._id_filmes = filmes_musicas.filmes_id_filmes AND _id_musica = musicas_id_musica

    AND $filters LIKE '%$option%'";

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="clone.js"></script>

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

            <div class=" col-xs-12 subtitle start-xs">
                <p>SEARCH</p>

            </div>
        </div>

        <div class="row">

            <div class="col-xs-12 start-xs">

       
                
                <form action="#" method="post">
  
    <!--
    ########################################## -->
    <!-- START CLONED SECTION -->
    <!-- ########################################## -->
    <div id="testingDiv1" class="clonedInput">
         <h2 id="reference" name="reference" class="heading-reference"></h2>
  
            <label  for="select" class="test-select-label">FILTER</label>
                    <select id="select" name="filters" class="test-select">
                     <option value="filme" selected> </option>
                        <option value="filme" >Movie Name</option>
                        <option value="classif">Age rating</option>
                        <option value="realizador">Director</option>
                        <option value="nome_ator">Actor</option>
                        <option value="nome_genero">Genre</option>
                        <option value="nome_musica">Song</option>
                        <option value="cantor">Singer/Band</option>
                        <option value="imdb_rating">Imdb Rating</option>
                        <option value="ost_rating">OST Rating</option>
                    </select>
                    
                      <label for="option" class="test-option-label">Your Option:</label>
        <input type="option" id="option" name="option" class="test-option"
        />
      
                  
                   
        
      
        
    </div>
    <!--/clonedInput-->
    <!-- ########################################## -->
    <!-- END CLONED SECTION -->
    <!-- ########################################## -->
    <!-- ADD - DELETE BUTTONS -->
    <div class="row">
    <div id="add-del-buttons" class="col-xs-12 center-xs start-sm">
        <input type="button" id="btnAdd" class="btn-default col-xs-5 col-sm-4" value="ADD FILTER">
        <input type="button" id="btnDel" class="btn-default col-xs-5 col-sm-4" value="REMOVE FILTER">
   
      <input type="submit" class="col-xs-12 col-sm-3 btn-dark" value="SEARCH">
       </div></div>
    <!-- /ADD - DELETE BUTTONS -->
</form>

            </div>

            <div class='col-xs-12 start-xs'>

                <?php

                    //-------------------------------RESULTADOS-----------------------------//

                    if ($result_filme->num_rows == 0) {
                        echo " No results";
                    }

                    if ($result_filme->num_rows > 0) {
                    // output data of each row
                        echo $result_filme->num_rows . " results for <b>" . $_POST["filters"] . " <i>";   //imprime o filtro usado
                        echo $_POST["option"] . "</i></b> :<br>"; //imprime o que foi escrito no filtro
                        
                        echo "<div class='row center-xs start-md'>";
                        while($row = $result_filme->fetch_assoc()) {

                            echo "
                                <div class='col-xs-5 col-md-2'>
                                        <a class='nav__link center-xs' href=" . "movie.php?movieid=" . $row["_id_filmes"] . "><img src=" . $row["image"] . " class=" ." logo" . "> </a>
                                    </div>
                                    <div class='col-xs-7 col-md-4'>
                                        <p class='subtitle text-left middle-xs'>" . $row["filme"] . "</p>" .
                                        "<p class='text text-left middle-xs'>
                                            <b>Release date: </b>" . $row["data_lanc"] .
                                            "<br><b>Director: </b>" . $row["realizador"] . "
                                            <br><b>IMDB Rating: </b>" . $row["imdb_rating"] . "/10
                                            <br><b>OST Rating: </b>" . $row["ost_rating"] . "/100
                                        </p>
                                    </div>
                                <br>";

                        }

                    }
                ?>

            </div>
            </div>

        </div>

        <!--------------MODAL---------->

        <div class="row center-xs">

            <button class="btn-default  md-trigger  data-modal="modal-1">HELP US GROW</button>

            <div class="md-modal-xs md-effect-1" id="modal-1">
                <div class="md-content-xs">
                    <button class="md-close btn-default">Close me!</button>

                    <div>
                        <form action="demo_form.asp">
                            <label class="input-anim" for="">
                                <span class="label__info">Movie Name</span>
                                <input class="input-anim" type="text" name="movie">
                                <br> </label>

                            <label class="input-anim" for="">
                                <span class="label__info">Age rating</span>
                                <input type="text" name="agerating">
                                <br>
                            </label>

                            <label class="input-anim" for="">
                                <span class="label__info">Release date</span>
                                <input type="text" name="year">
                                <br>
                            </label>

                            <label class="input-anim" for="">
                                <span class="label__info">Director</span>
                                <input type="text" name="director">
                                <br>
                            </label>

                            <label class="input-anim" for="">
                                <span class="label__info">IMDB Rating</span>
                                <input type="text" name="imdb">
                                <br>
                            </label>

                            <label class="input-anim" for="">
                                <span class="label__info">OST Rating</span>
                                <input type="text" name="ost">
                                <br>
                            </label>
                            <label class="input-anim" for="">
                                <span class="label__info">Genre</span>
                                <input type="text" name="genre">
                                <br>
                            </label>

                            <label class="input-anim" for="">
                                <span class="label__info">Song</span>
                                <input type="text" name="song">
                                <br>
                            </label>

                            <label class="input-anim" for="">
                                <span class="label__info">Singer/Band</span>
                                <input type="text" name="band">
                                <br>
                            </label>

                            <label class="input-anim" for="">
                                <span class="label__info">Actor</span>
                                <input type="text" name="actor">
                                <br>
                            </label>

                            <br>
                            <input type="submit" class="btn-default" value="Submit">
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