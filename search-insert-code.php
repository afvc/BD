<?php
    
    $MovieOuterError="";

    //---------------- INSERT FILME -------------------//
    if(isset($_POST['addmovie'])) {

    //------------------ COMEÇAR TRANSAÇÃO  -----------------// 
    try {
        
          mysqli_autocommit($conn, FALSE);
    

        
        $insert_movie=$conn->query("START TRANSACTION;");
        
        $insert_actor=$conn->query("START TRANSACTION;"); 
        $insert_actor_movie=$conn->query("START TRANSACTION;");
        
        $insert_song=$conn->query("START TRANSACTION;"); 
        $insert_song_movie=$conn->query("START TRANSACTION;");
     
        $insert_genre=$conn->query("START TRANSACTION;");
        $insert_genre_movie=$conn->query("START TRANSACTION;");
       


        //----VARIÁVEIS PARA USAR NO INSERT

        $filme = $_POST["filme"];           //o que foi escrito no filme
        $classif = $_POST["classif"];       //o que foi escrito na classificação
        $data_lanc = $_POST["data_lanc"];   //o que foi escrito na data de lançamento
        $realizador = $_POST["realizador"]; //o que foi escrito no realizador
        $imdb_rat = $_POST["imdb_rating"];  //o que foi escrito no imdb_rating
        $ost_rat = $_POST["ost_rating"];    //o que foi escrito no ost_rating

        $genero = $_POST["nome_genero"];    //o que foi escrito no género
        
        //genero 2
        $genero_2 = $_POST["ID2_nome_genero"];    //o que foi escrito no género
        
        //genero 3
        $genero_3 = $_POST["ID3_nome_genero"];    //o que foi escrito no género

        $nome_musica = $_POST["nome_musica"]; //o que foi escrito na música
        $genero_musica = $_POST["genero"];   //o que foi escrito no género
        $ano_musica = $_POST["ano"];         //o que foi escrito no ano
        $cantor = $_POST["cantor"];          //o que foi escrito no cantor/banda

        //música 2
        $nome_musica_2 = $_POST["ID2_nome_musica"];     //o que foi escrito na música
        $genero_musica_2 = $_POST["ID2_genero"];        //o que foi escrito no género
        $ano_musica_2 = $_POST["ID2_ano"];              //o que foi escrito no ano
        $cantor_2 = $_POST["ID2_cantor"];               //o que foi escrito no cantor/banda

        //música 3
        $nome_musica_3 = $_POST["ID3_nome_musica"];     //o que foi escrito na música
        $genero_musica_3 = $_POST["ID3_genero"];        //o que foi escrito no género
        $ano_musica_3 = $_POST["ID3_ano"];              //o que foi escrito no ano
        $cantor_3 = $_POST["ID3_cantor"];               //o que foi escrito no cantor/banda

        $nome_ator = $_POST["nome_ator"];    //o que foi escrito no ator
        
        //ator 2
        $nome_ator_2 = $_POST["ID2_nome_ator"];    //o que foi escrito no ator
        
        //ator 3
        $nome_ator_3 = $_POST["ID3_nome_ator"];    //o que foi escrito no ator

        //----INSERTS

        $insert_movie=$conn->query("INSERT INTO filmes (_id_filmes, filme, image, classif, data_lanc, realizador, imdb_rating, ost_rating, flag_filme_add, flag_filme_estreia, Utilizadoruser_name)

        VALUES (' ' , '$filme', 'assets/images/soon.jpg', '$classif', '$data_lanc', '$realizador', '$imdb_rat', '$ost_rat', '1', '1', 'user')");

        $last_movie = mysqli_insert_id($conn);

        
        $insert_genre=$conn->query("INSERT INTO generos (_id_genero, nome_genero)

        VALUES (' ' , '$genero')");

        $last_genre = mysqli_insert_id($conn);

        $insert_genre_movie=$conn->query("INSERT INTO filmes_generos (filmes_id_filmes, generos_id_genero)

        VALUES ('$last_movie', '$last_genre')");    

        if($genero_2 != '') { //género 2
        
            $insert_genre_2=$conn->query("INSERT INTO generos (_id_genero, nome_genero)

            VALUES (' ' , '$genero_2')");

            $last_genre_2 = mysqli_insert_id($conn);

            $insert_genre_2_movie=$conn->query("INSERT INTO filmes_generos (filmes_id_filmes, generos_id_genero)

            VALUES ('$last_movie', '$last_genre_2')");    
        }

        if($genero_3 != '') { //género 3
        
            $insert_genre_3=$conn->query("INSERT INTO generos (_id_genero, nome_genero)

            VALUES (' ' , '$genero_3')");

            $last_genre_3 = mysqli_insert_id($conn);

            $insert_genre_3_movie=$conn->query("INSERT INTO filmes_generos (filmes_id_filmes, generos_id_genero)

            VALUES ('$last_movie', '$last_genre_3')");    
        }

        
        $insert_song=$conn->query("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)

        VALUES (' ', '$nome_musica', '$genero_musica', '$ano_musica', '$cantor', '0', 'user');");

        $last_song = mysqli_insert_id($conn);

        $insert_song_movie=$conn->query("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)

        VALUES ('$last_movie', '$last_song')");
        
        if($nome_musica_2 != '') { //música 2

            $insert_song_2=$conn->query("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)

            VALUES (' ', '$nome_musica_2', '$genero_musica_2', '$ano_musica_2', '$cantor_2', '0', 'user');");

            $last_song_2 = mysqli_insert_id($conn);

            $insert_song_2_movie=$conn->query("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)

            VALUES ('$last_movie', '$last_song_2')");
        }
        
        if($nome_musica_3 != '') { //música 3

            $insert_song_3=$conn->query("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)

            VALUES (' ', '$nome_musica_3', '$genero_musica_3', '$ano_musica_3', '$cantor_3', '0', 'user');");

            $last_song_3 = mysqli_insert_id($conn);

            $insert_song_3_movie=$conn->query("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)

            VALUES ('$last_movie', '$last_song_3')");
        }

        
        $insert_actor=$conn->query("INSERT INTO atores(_id_ator, nome_ator, nasc_ator)

        VALUES (' ' , '$nome_ator', 'NULL')");

        $last_ator = mysqli_insert_id($conn);

        $insert_actor_movie=$conn->query("INSERT INTO filmes_atores (filmes_id_filmes, atores_id_ator)

        VALUES ('$last_movie', '$last_ator')");
        
        if($nome_ator_2 != '') { //ator 2

            $insert_actor_2=$conn->query("INSERT INTO atores(_id_ator, nome_ator, nasc_ator)

            VALUES (' ' , '$nome_ator_2', 'NULL')");

            $last_ator_2 = mysqli_insert_id($conn);

            $insert_actor_2_movie=$conn->query("INSERT INTO filmes_atores (filmes_id_filmes, atores_id_ator)

            VALUES ('$last_movie', '$last_ator_2')");
        }

        if($nome_ator_3 != '') { //ator 2
        
            $insert_actor_3=$conn->query("INSERT INTO atores(_id_ator, nome_ator, nasc_ator)

            VALUES (' ' , '$nome_ator_3', 'NULL')");

            $last_ator_3 = mysqli_insert_id($conn);

            $insert_actor_3_movie=$conn->query("INSERT INTO filmes_atores (filmes_id_filmes, atores_id_ator)

            VALUES ('$last_movie', '$last_ator_3')");
        }
        
        //----------------- COMMITS -----------------// 

        mysqli_commit($conn);    

        //Alerta de que os commits foram feitos
        $MovieOuterError = "Movie submited with success";

       //--------- CASO ERRO -> ROLLBACK  ------------//
    }   catch (Exception $e) {
                   
        mysqli_rollback($conn);
        
        $MovieOuterError = "Movie not submited, try again";

       }
    
    }
?>