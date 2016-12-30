<?php
 include 'connection.php';

session_start();

$Lerror = false;
$LusernameError ="";
$LpassError ="";
$LerrTyp = "";
$LerrMSG = "";
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
    
$log = $conn->query("SELECT * FROM utilizador where passwd LIKE'$passdb' AND username LIKE'$userdb'");
$count1=mysqli_num_rows($log);  
    
if ($count1!= 0) {
    echo "success";    
    $LerrTyp = "success";
    $LerrMSG = "Successfully logged";
    $_SESSION['login_user']=$userdb;
    $_SESSION['login_pass']=$passdb;// Initializing Session
         
    header("Location:home.php"); // Redirecting To Other Page 
  

}   else {
    /*header("Location:forms.php"); // Redirecting To Other Page */
    $LerrTyp = "danger";
    $LerrMSG = "Something went wrong, try again later..."; 
  
}
    

 
}
   
}
mysqli_close($conn);   


?>