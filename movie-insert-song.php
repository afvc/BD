<?php

    $OuterError="";

    //---------------- INSERT MÚSICA -------------------//
    if(isset($_POST['addsong'])) {
    
    //------------------ COMEÇAR TRANSAÇÃO  -----------------// 
    try {
        
       mysqli_autocommit($conn, FALSE);
    
        
        $insert_song=$conn->query("START TRANSACTION;");   
        $insert_song_movie=$conn->query("START TRANSACTION;");
       
    
        //música 2    
        $insert_song_2=$conn->query("START TRANSACTION;");            
        $insert_song_2_movie=$conn->query("START TRANSACTION;");
        
    
        //música 3    
        $insert_song_3=$conn->query("START TRANSACTION;");
        $insert_song_3_movie=$conn->query("START TRANSACTION;");
    


        //VARIÁVEIS PARA USAR NO INSERT

        $nome_musica = $_POST["nome_musica"];       //o que foi escrito na música
        $genero_musica = $_POST["genero"];          //o que foi escrito no género
        $ano_musica = $_POST["ano"];                //o que foi escrito no ano
        $cantor = $_POST["cantor"];                 //o que foi escrito no cantor/banda

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

        $yearnum = $_POST['ID3_ano'];
      
        
        $insert_song=$conn->query("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)

        VALUES (' ', '$nome_musica', '$genero_musica', '$ano_musica', '$cantor', '0', 'user');");

        $last_song = mysqli_insert_id($conn);

        $insert_song_movie=$conn->query("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)

        VALUES ('$movieid', '$last_song')");

        
        if($nome_musica_2 != '') { //música 2

            $insert_song_2=$conn->query("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)

            VALUES (' ', '$nome_musica_2', '$genero_musica_2', '$ano_musica_2', '$cantor_2', '0', 'user');");

            $last_song_2 = mysqli_insert_id($conn);

            $insert_song_2_movie=$conn->query("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)

            VALUES ('$movieid', '$last_song_2')");
        }
        
        if($nome_musica_3 != '') { //música 3

            $insert_song_3=$conn->query("INSERT INTO musicas (_id_musica, nome_musica, m_generos, m_ano, cantor, flag_musicas_novas, Utilizadoruser_name)

            VALUES (' ', '$nome_musica_3', '$genero_musica_3', '$ano_musica_3', '$cantor_3', '0', 'user');");

            $last_song_3 = mysqli_insert_id($conn);

            $insert_song_3_movie=$conn->query("INSERT INTO filmes_musicas (filmes_id_filmes, musicas_id_musica)

            VALUES ('$movieid', '$last_song_3')");
        }


       //----------------- COMMITS  -----------------// 

     /*  mysqli_commit($conn);*/
                

        //Alerta de que commits foram feitos
        $OuterError = "Song submited with success";

       //--------- CASO ERRO -> ROLLBACK  ------------//
    }   catch (Exception $e) {

       mysqli_rollback($conn);
        
        $OuterError = "Song not submited, try again";
    }

    }
?>