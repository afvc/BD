<?php  
 
include 'connection.php';

?>
    <!DOCTYPE html>
    <html>

    <head>

        <!-- META TAGS -->
        <meta charset="UTF-8" />
        <title>Spotlight</title>


        <!-- STYLESHEETS -->

        <link rel="stylesheet" href="assets/css/flexboxgrid.min.css" type="text/css">

        <link rel="stylesheet" href="assets/css/_font-awesome.min.css.scss" type="text/css">

        <link rel="stylesheet" href="assets/css/style.css" type="text/css">


    </head>


    <body>
        <?php include 'navbar.php'; ?>
            <section class="section-resized">

          <?php include 'texto-in.php'; ?>
<p>Want to know more?<a href="forms.php" class="col-xs-6  subtitle">Login</a></p>
                <div class="row">
                    <div class="subtitle col-xs-12 start-xs">
                        <p id="calendar">CALENDAR</p>
                        <iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;height=600&amp;wkst=1&amp;hl=en&amp;bgcolor=%23ffffff&amp;src=anafilipavc%40gmail.com&amp;color=%23e3e5a9&amp;ctz=Europe%2FLisbon" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                    </div>

                </div>


            </section>


            

    </body>


    </html>