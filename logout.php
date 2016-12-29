<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: forms.php"); // Redirecting To Home Page
}
?>