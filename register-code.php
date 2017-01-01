<?php
    include 'connection.php';

    session_start(); //para usar variáveis de sessão

    $error = false;
    $usernameError ="";
    $passError ="";
    $errTyp = "";
    $errMSG = "";

    if (isset($_REQUEST['btn-signup']) ) {

        // Define $username and $password
        $userN = trim($_POST['usern']);
        $passN = trim($_POST['passn']);

        $verify = $conn->query("SELECT username FROM utilizador WHERE username LIKE '$userN'");

        $count=mysqli_num_rows($verify);

         // userame validation

        if (empty($userN)) {
            $error = true;
            $usernameError = "Please enter username.";

        } else if (strlen($userN) < 3) {
            $error = true;
            $usernameError = "Name must have at least 3 characters.";

        } else if ($count!= 0){
            $error = true;
            $usernameError = "Username already exists";
        }


        // password validation
        if (empty($passN)){
            $error = true;
            $passError = "Please enter password.";
        } else if(strlen($passN) < 4) {
            $error = true;
            $passError = "Password must have at least 4 characters.";
        }

        // if there's no error, continue to signup
        if( !$error ) {

        $queryn = "INSERT INTO utilizador(username,passwd,tipo_user) VALUES('$userN','$passN','user')";

            $res = $conn->query($queryn);

            if ($res) {
                $errTyp = "success";
                $errMSG = "Successfully registered";
                unset($userN);
                unset($passN);
            } else {
                $errTyp = "danger";
                $errMSG = "Something went wrong, please try again.";	
            }

        }
    }

?>