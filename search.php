<!---- Acesso à base de bados --->
<?php

    //para usar nos selects
    $filters = $_POST["filters"];   //o filtro usado
    $filters_2 = $_POST["ID2_filters"];   //o filtro usado
    $filters_3 = $_POST["ID3_filters"];   //o filtro usado
    $filters_4 = $_POST["ID4_filters"];   //o filtro usado

    $option = $_POST["option"];     //o que foi escrito no filtro
    $option_2 = $_POST["ID2_option"];     //o que foi escrito no filtro
    $option_3 = $_POST["ID3_option"];     //o que foi escrito no filtro
    $option_4 = $_POST["ID4_option"];     //o que foi escrito no filtro
  
    
    include 'connection.php';
    include('logx.php');
    
//----------------------SELECT FILME------------------------//

    $select_filme = "SELECT DISTINCT _id_filmes, filme, image, data_lanc, realizador, imdb_rating, ost_rating

    FROM filmes, filmes_atores, atores, filmes_generos, generos, filmes_musicas, musicas

    WHERE filmes._id_filmes = filmes_atores.filmes_id_filmes AND _id_ator = atores_id_ator AND 

    filmes._id_filmes = filmes_generos.filmes_id_filmes AND _id_genero = generos_id_genero AND 

    filmes._id_filmes = filmes_musicas.filmes_id_filmes AND _id_musica = musicas_id_musica

    AND $filters LIKE '%$option%'
";

    echo $select_filme;

    $result_filme = $conn->query($select_filme);


//----------------------INSERT FILME------------------------//

    $filme = $_POST["filme"];       //o que foi escrito no filme
    $classif = $_POST["classif"];          //o que foi escrito na classificação
    $data_lanc = $_POST["data_lanc"];                //o que foi escrito na data de lançamento
    $realizador = $_POST["realizador"];                 //o que foi escrito no realizador

    $insert_filme= "INSERT INTO filmes (_id_filmes, filme, image, classif, data_lanc, realizador, imdb_rating, ost_rating, flag_filme_add, flag_filme_estreia, Utilizadoruser_name)
    
    VALUES (NULL, '$filme', NULL, '$classif', '2016-12-19', '$realizador', '10', '100', '1', '1', 'user');";

    if ($conn->query($insert_filme) == TRUE) {
        echo "<br>New movie inserted";
    }

?>

    <!DOCTYPE html>
    <html>

    <head>

        <!-- META TAGS -->
        <meta charset="UTF-8" />
        <title>Spotlight Search</title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="clone.js"></script>
        <script src="clone-song.js"></script>
        <script src="clone-act.js"></script>
    </head>


    <body>
        <?php include 'navbar.php'; ?>

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

                                <label for="select" class="test-select-label">FILTER</label>
                                <select id="select" name="filters" class="test-select">
                                    <option selected> </option>
                                    <option value="filme">Movie Name</option>
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
                                <input type="option" id="option" name="option" class="test-option" />

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
                                </div>
                            </div>
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

                <div class="row center-xs ">

                    <button class="grow  btn-default  md-trigger" data-modal="modal-1">HELP US GROW</button>

                    <div class="md-modal-xs md-effect-1" id="modal-1">
                        <div class="md-content-xs">
                            <button class="md-close btn-default-fixed">Close me!</button>

                            <div>
                                <form action="#" method="post">
                                    <label class="input-anim" for="">
                                        <br>
                                        <br><span class="label__info">Movie Name</span>
                                        <input class="input-anim" type="text" name="movie">
                                        <br> </label>

                                    <label class="input-anim" for="">
                                        <span class="label__info">Age rating</span>
                                        <input type="text" pattern="\d*" maxlength="2" name="agerating">
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
                                        <input type="text" pattern="\d*" maxlength="3" name="imdb">
                                        <br>
                                    </label>

                                    <label class="input-anim" for="">
                                        <span class="label__info">OST Rating</span>
                                        <input type="text" pattern="\d*" maxlength="4" name="ost">
                                        <br>
                                    </label>
                                    <label class="input-anim" for="">
                                        <span class="label__info">Genre</span>
                                        <input type="text" name="genre">
                                        <br>
                                    </label>


                                    <div id="copy1" class="clone">
                                        <label for="text" class="test-text-label input-anim">
                                            <span class="label__info">Song</span>
                                            <input type="text" id="text" name="nome_musica" class="test-text " />
                                            <br>
                                        </label>

                                        <label for="text" class="test-text-label input-anim">
                                            <span class="label__info"> Artist/Band</span>
                                            <input type="text" id="text" name="cantor" class="test-text" />
                                            <br>
                                        </label>

                                    </div>

                                    <div id="add-del-buttons">
                                        <input type="button" id="btnAddS" class="btn-default" value="1 MORE SONG">
                                        <input type="button" id="btnDelS" class="btn-default" value="REMOVE LAST SONG">
                                    </div>

                                    <div id="copyC1" class="cloneC">
                                        <label for="text" class="test-text-label input-anim">
                                            <span class="label__info">Actor</span>
                                            <input type="text" id="text" name="nome_ator" class="test-text " />
                                            <br>
                                        </label>

                                    </div>

                                    <div id="add-del-buttons">
                                        <input type="button" id="btnAddC" class="btn-default" value="1 MORE ACTOR">
                                        <input type="button" id="btnDelC" class="btn-default" value="REMOVE LAST ACTOR">
                                    </div>


                                    <br>
                                    <input type="submit" class="btn-default" value="ADD MOVIE">
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
            <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

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