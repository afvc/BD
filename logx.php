<?php
 include('login.php');
     
$logged = $_SESSION['login_user'];
 if( $logged!==null){
     
}else{
header("Location:form.php");}

?>