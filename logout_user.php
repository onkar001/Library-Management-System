<?php 

$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
session_start();
unset($_SESSION['student_id']);
session_destroy(); // destroy session
header("location:home.php"); 
exit();
?>