
                            <form action="" method="post">
       
<?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="">
            	<div class=" text-bold text-light alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
				<span class=""></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
            
            <label class="text-light">UserName :</label>
                <input type="text" name="usern" class="" placeholder="Enter Name" maxlength="50"value="<?php echo $name ?>" />
 
                <span class="text-danger"><br><?php echo $usernameError; ?><br></span>
             
                
                
 <label class="text-light">Password :</label>
                <input type="password" name="passn" class="form-control" placeholder="Enter Password" maxlength="15" /> 
                <span class="text-danger"><br><?php echo $passError; ?><br></span>
             

  <div class="end-xs"> <input name="btn-signup" type="submit" class="btn-dark" value= "Register">
                                </div>   
                


        </form> 