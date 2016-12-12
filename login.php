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
    
    
$servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "spotlight"; // Pasta do sql
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected successfully";
    
    
$userdb = stripslashes($userdb);
$passdb = stripslashes($passdb);
    
    
// Selecting Database
    
 
    
$result = $conn->query("select * from login where passwd='$passdb' AND username='$userdb'");
    
if ($result->num_rows ==1) {
                         
$_SESSION['login_user']=$userdb; // Initializing Session
                                 
header("Location:search.php"); // Redirecting To Other Page
   echo "log";
exit; 
 
    
} else {
    
$error = 'Username or Password is invalid';
}
    
mysql_close($conn); // Closing Connection
    
}
}
?>