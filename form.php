<!---- Acesso à base de bados --->
<?php 

 

include('login.php'); // Includes Login Script

/*if(isset($_SESSION['login_user'])){
header("Location:profile.php");
     
} else{header("Location:form.php");
      }*/
 ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Login Form in PHP with Session</title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    </head>

    <body>
        <div class="bg-black">
        <section class="section-resized">
           <div class="row"><div class="col-xs-12">
            <p class="title text-lightest">Login </p>
            <div id="login">
                 
                <form action="" method="post">
                    <label class="text-light">UserName :</label>
                    <input id="name" name="user" placeholder="username" type="text">
                    <label  class="text-light">Password :</label>
                    <input id="password" name="pass" placeholder="**********" type="password">
                    <input name="submit" type="submit" class="btn-dark "value=" Login ">
                     
                </form></div></div>
            </section>
            </div></div>
    </body>

    </html>