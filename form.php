<!---- Acesso à base de bados --->
<?php 

 

include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("Location:search.php");
     
}
 ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Login Form in PHP with Session</title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    </head>

    <body>
        <div id="main">
            <h1>Login </h1>
            <div id="login">
                <h2>Login Form</h2>
                <form action="" method="post">
                    <label>UserName :</label>
                    <input id="name" name="user" placeholder="username" type="text">
                    <label>Password :</label>
                    <input id="password" name="pass" placeholder="**********" type="password">
                    <input name="submit" type="submit" value=" Login ">
                     
                </form>
            </div>
        </div>
    </body>

    </html>