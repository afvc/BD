<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
 $_SESSION['erros']=false; 
if (isset($_POST['submit'])) {
if (empty($_POST['user']) || empty($_POST['pass'])) {
 echo "<script>  alert('Username or Password is invalid')</script>";
}
else
{
// Define $username and $password
 
$userdb=$_POST['user'];
$passdb=$_POST['pass'];

    include 'connection.php';  
    
// Selecting Database
  
    
$log = $conn->query("select * from Utilizador where passwd='$passdb' AND username='$userdb'");
    
if ($log->num_rows ==1) {
                   
    $_SESSION['login_user']=$userdb;
     $_SESSION['login_pass']=$passdb;// Initializing Session
         
   header("Location:index.php"); // Redirecting To Other Page 
  

} else {
    
/*$error = 'Username or Password is invalid';*/
   
  echo "alert('Username or Password is invalid')";    
     header("Location:form.php"); 
  
}
    
mysql_close($conn); // Closing Connection
    
}
}
?>