<!---- Acesso à base de bados --->
<?php 

   include 'login.php'; 
   include 'register.php'; 
  
 
  
 ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Spotlight Login</title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
         <link href="assets/css/flexboxgrid.min.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    </head>

    <body>
        <div class="bg-black">
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
            	<div class=" text-bold text-light alert alert-<?php echo ($LerrTyp=="success") ? "success" : $LerrTyp; ?>">
				<span class=""></span> <?php echo $LerrMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
                               
                                <label class="text-light">UserName :</label>
                                <input id="name" name="user" placeholder="username" type="text" >
                                 <span class="text-danger"><br><?php echo $LusernameError; ?><br></span>
                                 
                                <label class="text-light">Password :</label>
                                <input id="password" name="pass" placeholder="**********" type="password">
                                  <span class="text-danger"><br><?php echo $LpassError; ?><br></span>

                                <div class="end-xs"> <input name="submit" type="submit" class="btn-dark " value=" Login ">
                                </div>               
                            </form>
                            
                            
                        </div>
                      
                    </div>
          <!--<div class="col-sm-9 col-xs-12 end-xs"> <br><br><a class="subtitle text-lightest" href="register.php">Register</a> </div>-->
            </div>
            <div class="row col-xs-12 col-lg-offset-4 col-lg-3 col-md-offset-3 col-md-2 col-sm-2 col-sm-offset-2">
                    <div class="col-xs-12">
                        <p class="title text-lightest">Register </p>
                        <div class="login">

                       <?php 

   include 'register-form.php'; 
  
 ?>     
                            
                        </div>
                      
                    </div>
          <!-- <div class=" col-xs-12 col-sm-9 end-xs"> <br><br><a class="subtitle text-lightest" href="register.php">Register</a> </div>--> 
            </div>
                </div>
             </section>
        </div>
    </body>

    </html>