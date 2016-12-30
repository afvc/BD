<?php
 include 'login.php';
 include 'connection.php';

    $logged = $_SESSION['login_user'];

    if( $logged!==null){

    }else{
        
        header("Location:forms.php");
    } 
?>


