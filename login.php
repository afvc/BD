<?php

$Lerror = false; // Variable To Store Error Message
session_start(); // Starting Session

 include 'connection.php'; 
$Lerror = false;

if (isset($_POST['submit'])) {

// Save $username and $password
 
$userdb=$_POST['user'];
$passdb=$_POST['pass'];

     	 // username validation
    if (empty($_POST['user'])) {
			$Lerror = true;
			$LusernameError = "Please enter username.";
		}  
		
		// password validation
		if (empty($_POST['pass'])){
			$Lerror = true;
			$LpassError = "Please enter password.";
		} 
    
if( !$Lerror ) {
    
$log = $conn->query("select * from Utilizador where passwd='$passdb' AND username='$userdb'");
    
if ($log->num_rows ==1) {
                   
    $_SESSION['login_user']=$userdb;
    $_SESSION['login_pass']=$passdb;// Initializing Session
         
    header("Location:index.php"); // Redirecting To Other Page 
  

}   else {
    
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
      
}
    
mysql_close($conn); // Closing Connection
    
}
}



?>