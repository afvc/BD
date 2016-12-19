<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['user']) || empty($_POST['pass'])) {
$error = 'Username or Password is invalid';
}
else
{
// Define $username and $password
    
    
$userdb=$_POST['user'];
$passdb=$_POST['pass'];
    
    include 'connection.php';  
    
//$userdb = stripslashes($userdb);
//$passdb = stripslashes($passdb);
    
    
// Selecting Database
  
    
$log = $conn->query("select * from Utilizador where passwd='$passdb' AND username='$userdb'");
    
if ($log->num_rows ==1) {
                   echo $passdb;      
    $_SESSION['login_user']=$userdb; // Initializing Session
         
   header("Location:index.php"); // Redirecting To Other Page 
  

} else {
    
/*$error = 'Username or Password is invalid';*/
    sleep(2);
     echo "<script>  alert('Username or Password is invalid')</script>";
    sleep(5);
     header("Location:form.php");
}
    
mysql_close($conn); // Closing Connection
    
}
}
?>