<?php
    include 'login-check.php'; //verificar se login foi feito
    include 'connection.php'; //para a ligação à base de dados

    include 'search-insert-code.php';
    include 'search-select.php';
   
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
        <script src="assets/js/clone-filter.js"></script>
        <script src="assets/js/clone-insert-song.js"></script>
        <script src="assets/js/clone-act.js"></script>
        <script src="assets/js/clone-gen.js"></script>
    </head>


    <body>
        <?php include 'navbar.php'; ?>

            <section class="section-resized">
                <div class="row">

                    <div class="col-xs-12 subtitle start-xs">
                        <p>SEARCH</p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xs-12 start-xs">

                        <!------FILTROS DE PESQUISA------>
                        <form name="search_form" method="post">


                            <!-- START CLONED SECTION -->
                            <div id="testingDiv1" class="clonedInput">

                                <label for="select" class="test-select-label">FILTER</label>
                                <select id="select" name="filters" class="test-select">
                                    <option value="filme" <?php if ($_SESSION[ 'filters']=="filme" ) {echo selected;} ?> >Movie Name</option>
                                    <option value="data_lanc" <?php if ($_SESSION[ 'filters']=="data_lanc" ) {echo selected;} ?> >Release date</option>
                                    <option value="classif" <?php if ($_SESSION[ 'filters']=="classif" ) {echo selected;} ?> >Age rating</option>
                                    <option value="realizador" <?php if ($_SESSION[ 'filters']=="realizador" ) {echo selected;} ?> >Director</option>
                                    <option value="nome_ator" <?php if ($_SESSION[ 'filters']=="nome_ator" ) {echo selected;} ?> >Actor</option>
                                    <option value="nome_genero" <?php if ($_SESSION[ 'filters']=="nome_genero" ) {echo selected;} ?> >Genre</option>
                                    <option value="nome_musica" <?php if ($_SESSION[ 'filters']=="nome_musica" ) {echo selected;} ?> >Song</option>
                                    <option value="cantor" <?php if ($_SESSION[ 'filters']=="cantor" ) {echo selected;} ?> >Singer/Band</option>
                                    <option value="imdb_rating" <?php if ($_SESSION[ 'filters']=="imdb_rating" ) {echo selected;} ?> >Imdb Rating</option>
                                    <option value="ost_rating" <?php if ($_SESSION[ 'filters']=="ost_rating" ) {echo selected;} ?> >OST Rating</option>
                                </select>

                                <label for="text" class="test-option-label">Your Option:</label>
                                <input type="option" id="option" name="option" class="test-option" value="<?php echo $_SESSION['option']; ?>" />

                            </div>
                            <!-- END CLONED SECTION -->

                            <!-- ADD / DELETE BUTTONS -->
                            <div class="row">
                                <div id="add-del-buttons" class="col-xs-12 center-xs start-sm">
                                    <input type="button" id="btnAdd" class="btn-default col-xs-5 col-sm-4" value="ADD FILTER">
                                    <input type="button" id="btnDel" class="btn-default col-xs-5 col-sm-4" value="REMOVE FILTER">

                                    <input type="submit" class="col-xs-12 col-sm-3 btn-dark" value="SEARCH" name="search">
                                </div>
                            </div>
                            <!-- END ADD / DELETE BUTTONS -->

                        </form>

                    </div>


                    <!--------- RESULTADOS - SEARCH --------->
                    <?php include 'search-resultados.php';?>

                </div>

                </div>

                <!----------- FORM - INSERT MOVIE ---------->

                <?php include 'search-insert-form.php';?>


            </section>

            <?php include 'modal-js.php';?>

    </body>

    </html>