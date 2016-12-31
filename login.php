<?php
    include 'login-code.php';
    include 'register-code.php'; 
?>

    <!DOCTYPE html>
    <html>

    <head>
        
        <meta charset="UTF-8">

        <title>Spotlight Login</title>
        

        <!-- STYLESHEETS -->

        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        
        <link href="assets/css/flexboxgrid.min.css" rel="stylesheet" type="text/css">

    </head>

        
    <body class="bg-black">
        <section class="section-resized">
            <div class="row">

                <div class="row">
                    <div class="col-xs-12 col-lg-6 col-md-4">
                        <p class="title text-lightest">Login </p>
                        <div class="login">

                            <form action="" method="post">

                                <?php
                                    if ( isset($LerrMSG) ) {
                                ?>
                                    <div class="">
                                        <div class=" text-bold text-light alert alert-<?php echo ($LerrTyp==" success ") ? "success " : $LerrTyp; ?>">
                                            <span class=""></span>
                                            <?php echo $LerrMSG; ?>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>

                                        <label class="text-light">UserName:</label>
                                        <input id="name" name="user" placeholder="Enter username" type="text">
                                        <span class="text-danger"><br><?php echo $LusernameError; ?><br></span>

                                        <label class="text-light">Password:</label>
                                        <input id="password" name="pass" placeholder="Enter password" type="password">
                                        <span class="text-danger"><br><?php echo $LpassError; ?><br></span>

                                        <div class="end-xs">
                                            <input name="submit" type="submit" class="btn-dark " value=" Login ">
                                        </div>
                            </form>


                        </div>

                    </div>

                </div>
                <div class="row col-xs-12 col-lg-offset-4 col-lg-3 col-md-offset-3 col-md-2 col-sm-2 col-sm-offset-2">
                    <div class="col-xs-12">
                        <p class="title text-lightest">Register </p>
                        <div class="login">

                            <form action="" method="post">

                                <?php
                                if ( isset($errMSG) ) {
                            ?>
                                    <div class="">
                                        <div class=" text-bold text-light <?php echo ($errTyp==" success ") ? "success " : $errTyp; ?>">
                                            <span class=""></span>
                                            <?php echo $errMSG; ?>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>

                                        <label class="text-light">UserName:</label>
                                        <input type="text" name="usern" class="" placeholder="Enter username" maxlength="50" />

                                        <span class="text-danger"><br><?php echo $usernameError; ?><br></span>



                                        <label class="text-light">Password:</label>
                                        <input type="password" name="passn" class="form-control" placeholder="Enter Password" maxlength="15" />
                                        <span class="text-danger"><br><?php echo $passError; ?><br></span>


                                        <div class="end-xs">
                                            <input name="btn-signup" type="submit" class="btn-dark" value="Register">
                                        </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </section>

    </body>

    </html>