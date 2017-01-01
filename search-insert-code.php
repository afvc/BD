<?php

    $MovieOuterError="";
    $newMovie="";
    //---------------------------------- INSERT FILME ----------------------------------//
    if(isset($_REQUEST['addmovie'])) {
        
        $newMovie=$conn->query("SET autocommit=0;") or die (mysqli_error());
        
        $newMovie=$conn->query("START TRANSACTION;") or die (mysqli_error());

        $filme = $_POST["filme"];               //o que foi escrito no filme
        $classif = $_POST["classif"];           //o que foi escrito na classificação
        $data_lanc = $_POST["data_lanc"];       //o que foi escrito na data de lançamento
        $realizador = $_POST["realizador"];     //o que foi escrito no realizador
        $imdb_rat = $_POST["imdb_rating"];      //o que foi escrito na imdb_rating
        $ost_rat = $_POST["ost_rating"];        //o que foi escrito na ost_rating
        
        $genero = $_POST["nome_genero"];        //o que foi escrito na género
        
        $nome_musica = $_POST["nome_musica"];   //o que foi escrito na música
        $genero_musica = $_POST["genero"];      //o que foi escrito no género
        $ano_musica = $_POST["ano"];            //o que foi escrito no ano
        $cantor = $_POST["cantor"];             //o que foi escrito no cantor/banda
        
        $nome_ator = $_POST["nome_ator"];       //o que foi escrito no ator
        
        
        $addmovie=("INSERT INTO filmes (_id_filmes, filme, image, classif, data_lanc, realizador, imdb_rating, ost_rating, flag_filme_add, flag_filme_estreia, Utilizadoruser_name)

        VALUES (' ' , '$filme', 'NULL', '$classif', '$data_lanc', '$realizador', '$imdb_rat', '$ost_rat', '1', '1', 'user')");
        
        $last_movie = query("SELECT last_insert_id();");

        
        $addgenre=("INSERT INTO genero (_id_genero, nome_genero)

        VALUES (' ' , '$genero')");
        
        $last_genre = query(last_insert_id());

        $addgenre_movie=("INSERT INTO filmes_generos (filmes_id_filmes, generos_id_genero)
    
        VALUES ('$last_movie', '$last_genre')");    
        
        
        $addsong=("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)
            
        VALUES (' ', '$nome_musica', '$genero_musica', '$ano_musica', '$cantor', '0', 'user');");
            
        $last_song = query(last_insert_id());

        $addsong_movie=("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)
    
        VALUES ('$last_movie', '$last_song')");
        
        
        $addactor=("INSERT INTO atores(_id_ator, nome_ator, nasc_ator)

        VALUES (' ' , '$nome_ator', 'NULL')");
        
        $last_ator = query(last_insert_id());
        
        $addactor_movie=("INSERT INTO filmes_atores (filmes_id_filmes, atores_id_ator)
    
        VALUES ('$last_movie', '$last_ator')");
        
        
        if($addmovie){
            $MovieOuterError = "Movie submited with success";
            
            $newmovie=$conn->query($addmovie) or die (mysqli_error());
            $newmovie=$conn->query("COMMIT") or die (mysqli_error());
            
            $newgenre=$conn->query($addgenre) or die (mysqli_error());
            $newgenre=$conn->query("COMMIT") or die (mysqli_error());
                        
            $newgenre_movie=$conn->query($addgenre_movie) or die (mysqli_error());
            $newgenre_movie=$conn->query("COMMIT") or die (mysqli_error());
            
            $newsong=$conn->query($addsong) or die (mysqli_error());
            $newsong=$conn->query("COMMIT") or die (mysqli_error());
                             
            $newsong_movie=$conn->query($addsong_movie) or die (mysqli_error());
            $newsong_movie=$conn->query("COMMIT") or die (mysqli_error());
                 
            $newactor=$conn->query($addactor) or die (mysqli_error());
            $newactor=$conn->query("COMMIT") or die (mysqli_error());
                             
            $newactor_movie=$conn->query($addactor_movie) or die (mysqli_error());
            $newactor_movie=$conn->query("COMMIT") or die (mysqli_error());
            
        
        } else{
            $addmovie=$conn->query("ROLLBACK");
            $MovieOuterError = "Movie not submited, try again";
           
        }
    }
?>