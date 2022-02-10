<?php
include "config/database.php";

session_start();



if(isset($_POST['submit'])){
     
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($email != "" && $password != ""){

        $sql_query = "select id,email,count(*) as cntUser from users where email='".$email."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        $student_id=$row['id'];

        if($count > 0){
          
            $_SESSION['student_id']=$student_id;
            $_SESSION['user_email']=$email;
            
            // echo'<script>alert("Login Successfully and Your student id is  "+"'.$student_id.'");
            // document.location.href = 'normalUser.php';
            // </script>';
            
            echo "<script>
          alert('Your student id is '+'$student_id');
          document.location.href = 'normalUser.php';
            </script>";       
            }
            else{
              echo "<script>alert('Invalid Credentials')</script>";        }

    }

}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Login Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

 <!-- <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();

        }


    </script>  -->

     <script language="javascript" type="text/javascript">
     window.history.forward();
</script>

<style>

@media (max-width:768px){

   .heading h1{
      font-size: 4rem;
   }

   #menu-btn{
      display: inline-block;
      transition: .2s linear;
   }

   #menu-btn.fa-times{
      transform: rotate(180deg);
   }

   .header .navbar{
      position: absolute;
      top:99%; left:0; right:0;
      background-color: var(--white);
      border-top: var(--border);
      padding:2rem;
      transition: .2s linear;
      clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
   }

   .header .navbar.active{
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
   }

   .header .navbar a{
      display: block;
      margin:2rem;
      text-align: center;
   }

}



/*  -------- CSS End ------------*/

body {
  color: #fff;
  background: #FFD580;
  font-family: 'Roboto', sans-serif;
}
.form-control {
  height: 40px;
  box-shadow: none;
  color: #969fa4;
}
.form-control:focus {
  border-color: #5cb85c;
}
.form-control, .btn {        
  border-radius: 3px;
}
.signup-form {
  width: 450px;
  margin: 0 auto;
  padding: 30px 0;
    font-size: 15px;

    margin-top: 80px;
}
.signup-form h2 {
  color: #636363;
  margin: 0 0 15px;
  position: relative;
  text-align: center;
  font-size: 30px;
}
.signup-form h2:before, .signup-form h2:after {
  content: "";
  height: 2px;
  width: 28%;
  background: #d4d4d4;
  position: absolute;
  top: 50%;
  z-index: 2;
} 
.signup-form h2:before {
  left: 0;
}
.signup-form h2:after {
  right: 0;
}
.signup-form .hint-text {
  color: #999;
  margin-bottom: 30px;
  text-align: center;
}
.signup-form form {
  color: #999;
  border-radius: 3px;
  margin-bottom: 15px;
  background: #f2f3f7;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  padding: 30px;
}
.signup-form .form-group {
  margin-bottom: 20px;
}
.signup-form input[type="checkbox"] {
  margin-top: 3px;

}
.signup-form input{
  font-size: 15px;
}
.signup-form .btn {        
  font-size: 16px;
  font-weight: bold;    
  min-width: 140px;
  outline: none !important;
}
.signup-form .row div:first-child {
  padding-right: 10px;
}
.signup-form .row div:last-child {
  padding-left: 10px;
}     
.signup-form a {
  color: #fff;
  text-decoration: underline;
}
.signup-form a:hover {
  text-decoration: none;
}
.signup-form form a {
  color: #5cb85c;
  text-decoration: none;
} 
.signup-form form a:hover {
  text-decoration: underline;
}  
</style>
</head>
<body>

<!-- header section starts  -->

<!-- <section class="header">

   <a href="#" class="logo" style="color:orange;">Libraryquip</a>

   <nav class="navbar">
      <a href="home.php">home</a>
      <a href="books.php">books</a>
      <a href="signup.php">Register</a>
      <a href="adminlogin.php">Admin</a>
      
   </nav>

   <div id="menu-btn" class="fas fa-bars"></div>

</section> -->

<!-- header section ends -->


<div class="signup-form">

    <form action="#" method="post">
      <div class="social-container">
          <img src="images\avatar.png" class="avatar" width="70" height="70" style="margin-left: 160px;">
          
        </div>
    <h2>User Log In</h2>
    <p class="hint-text">Log in your account.</p>
        
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="email" required="required">
        </div>

       

    <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
    

        <div class="form-group">
      <div class="text-center">Don't have an account? <a href="signup.php">Sign up</a></div>
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Log In </button>
        </div>
    </form>
  
</div>
</body>
</html>