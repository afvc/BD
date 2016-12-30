<?php

    
    $MovieOuterError="";
    $newMovie="";
    //---------------------------------- INSERT FILME ----------------------------------//
    if(isset($_REQUEST['addmovie'])) {
        
        $newMovie=$conn->query("SET autocommit=0;") or die (mysqli_error());
        
        $newMovie=$conn->query("START TRANSACTION;") or die (mysqli_error());

        $filme = $_POST["filme"];           //o que foi escrito no filme
        $classif = $_POST["classif"];       //o que foi escrito na classificação
        $data_lanc = $_POST["data_lanc"];   //o que foi escrito na data de lançamento
        $realizador = $_POST["realizador"]; //o que foi escrito no realizador
        
        
        $mov=$conn->query("INSERT INTO filmes (_id_filmes, filme, image, classif, data_lanc, realizador, imdb_rating, ost_rating, flag_filme_add, flag_filme_estreia, Utilizadoruser_name)

        VALUES (NULL , '$filme', 'NULL', '$classif', '2016-12-19', '$realizador', '10', '100', '1', '1', 'user')");
        
        $newMovie=$conn->query($mov) or die (mysqli_error());
        
        $newMovie=$conn->query("COMMIT") or die (mysqli_error());
        
        if($mov){

        $MovieOuterError = "Movie submited with success";
        
        } else{

            $MovieOuterError = "Movie not submited, try again";
           
            } }
    ?>