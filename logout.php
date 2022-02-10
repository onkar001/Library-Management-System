<?php 

$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
session_start();

session_destroy(); // destroy session
header("location:home.php"); 
exit();
?>