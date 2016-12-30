<?php  
	session_start();
include  'connection.php';

	$CPerror = false;
    $NewpassError ="";
 

 if(isset($_REQUEST['submitpass'])) {
     $newpass = $_POST['passwd'];
     $user= $_SESSION['login_user'];
      //echo strlen($pass);
    
     if (empty($newpass)) {
         
         $CPerror = true;
         $NewpassError = "Please enter a new password.";  
     
     } else if ( strlen($newpass) <= 3 ) { 
     
            $CPerror = true;
			$NewpassError = "Password must have at least 4 characters.";
     
     
     
     }
     
     if( !$CPerror ){
        
          $update=$conn->query("UPDATE utilizador SET passwd = '$newpass' WHERE utilizador.username= '$user'"); 
    	
		 	if ($update) {
				$NewpassError = "Password Changed";
			 
			} else {
				$NewpassError = "Something went wrong, try again later...";	
			} 
				
		}
      
 }
?>
                             