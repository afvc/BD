<?php
    include 'login-code.php';

    $logged = $_SESSION['login_user'];

    if( $logged!==null){

    }else{
        header("Location: login.php");
    } 
?>