<?php  

include 'login-check.php';  
include 'connection.php';
include 'change-pass.php';

?>
    <!DOCTYPE html>
    <html>

    <head>

        <meta charset="UTF-8">

        <title>Spotlight</title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    </head>


    <body>
        <?php include 'navbar.php'; ?>
            <section class="section-resized">


                <div class="row">
                    <div class="col-xs-12 bg-gray">
                        <p id="welcome" class="text-bold">Welcome 
                            <?php  echo  $_SESSION['login_user'];
                           ?>
                        </p>

                        <a class="text-light" href="logout.php">
                            <button class="btn-default">Log Out</button>
                        </a>
                        <button class="grow btn-dark  md-trigger" data-modal="modal-1"> Change Password</button>
                        <span class="text"><b><?php echo $NewpassError; ?></b></span>
                        <br>
                        
                        <br>
                    </div>
                </div>


                <!--------------MODAL---------->

                <div class="row center-xs">
                    <div class="md-modal-xs md-effect-1" id="modal-1">
                        <div class="md-content-xs">
                            <button class="md-close btn-default-fixed">Close me!</button>

                            <div>
                                <form action="#" method="post">


                                    <br>
                                    <br>

                                    <label for="text" class="input-anim">
                                        <span class="label__info">New Password</span>
                                        <input type="password" name="passwd" />

                                        <br>
                                    </label>

                                    <input class="btn-default" type="submit" value="Submit" name="submitpass">

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                </div>



                <?php include 'index-text.php'; ?>

                    <div class="row">
                        <div class="subtitle col-xs-12 start-xs">
                            <p id="calendar"> PREMIER CALENDAR</p>
                            <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;hl=en&amp;bgcolor=%23ffffff&amp;src=anafilipavc%40gmail.com&amp;color=%23e3e5a9&amp;ctz=Europe%2FLisbon" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                        </div>

                    </div>


            </section>

            <?php include 'modal-js.php'; ?>

    </body>


    </html>