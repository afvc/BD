<?php
   
 include 'login.php';

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Your Home Page</title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <div id="profile">
            <p id="welcome">Username : <i>
    <?php  
                echo  $_SESSION['login_user'];
                ?> </i></p>

            <p id="welcome">Password : <i>
    <?php echo  $passdb;;?> </i></p>


            <button ><a id="logout" href="logout.php">Log Out</a></button>
        </div>
    </body>

    </html>