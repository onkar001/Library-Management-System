<?php
include_once('config/database.php');
session_start();



if(isset($_POST['submit']))
{
$sql_query = "select id as cntUser from users where id=(select max(id) from users)";
  $result = mysqli_query($con,$sql_query);
  $row = mysqli_fetch_array($result);
  $student_id=$row['cntUser']+1;

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['password'];
$cpassword=$_POST['confirmpassword'];


//Serverside Validation
if(empty($name))
 {
  $error = "Enter your fullname !";
  $code = 1;
  echo "<script>alert('Enter your name !');</script>";

 }
  else if(empty($mobile))
 {
  $error = "Enter your mobile number !";
  $code = 2;
  echo "<script>alert('Enter Mobil  Number !');</script>";

 }
else if(!is_numeric($mobile))
 {
  $error = "Mobile number must be numeric only!";
  $code = 2;
   echo "<script>alert('Mobile number must be numeric only!');</script>";

 }
 else if(strlen($mobile)!=10)
 {
  $error = "Mobile nuber should be 10 digit only!";
  $code = 2;
  echo "<script>alert('Mobile nuber should be 10 digit only!');</script>";
 }
else if(empty($email))
 {
  $error = "Enter your email !";
  $code = 3;
  echo "<script>alert('Enter the email ID!');</script>";

 }
else if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
 {
  $error = "Enter valid email id !";
  $code = 3;
  echo "<script>alert('Please Enter Valid Email Id');</script>";

 }
else if(empty($password))
 {
  $error = "Enter your password";
  $code = 4;
  echo "<script>alert('Enter the Password!');</script>";

 }
 else if(strlen($password) < 6 )
 {
  $error = "Password must be 6 characters long !";
  $code = 4;
  echo "<script>alert('Password must be 6 characters long !');</script>";

 }
else if(empty($cpassword))
 {
  $error = "Enter your confirm password";
  $code = 5;
  echo "<script>alert('Please Re-enter your password');</script>";
 }
 else if(strlen($cpassword) < 6 )
 {
  $error = "Confirm Password must be atleast 6 characters long !";
  $code = 5;
  echo "<script>alert('Confirm Password must be atleast 6 characters long !');</script>";

 }
else if($cpassword!=$password)
 {
  $error = "Password and Confirm Password doesn't match";
  $code = 5;
 echo "<script>alert('Password and Confirm Password does not match');</script>";

 }
else{
//Checking emailid and mobile number if already registered
$ret=mysqli_query($con, "select id from users where email='$email' || mobile='$mobile'");
$result=mysqli_fetch_array($ret);
if($result>0){
 echo "<script>alert('This email already associated with another account');</script>";
}
else{
$query=mysqli_query($con,"insert into users(name,email,mobile,password) values('$name','$email','$mobile','$password')");
           
if($query){
              $_SESSION['student_id']=$student_id;
              $_SESSION['user_email']=$email;

          echo "<script>
          alert('Your student id is '+'$student_id');
          document.location.href = 'normalUser.php';
            </script>";

             
} else {
echo "<script>alert('Something went wrong. Please try again.')</script>";
echo "<script>window.location.href='normalUser.php';</script>";
}
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Registration Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<script language="javascript" type="text/javascript">
     window.history.forward();
</script>
   
<style>


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
  margin-top: 50px;
}
.signup-form h2 {
  color: #636363;
  margin: 0 0 15px;
  position: relative;
  text-align: center;
}
.signup-form h2:before, .signup-form h2:after {
  content: "";
  height: 2px;
  width: 25%;
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
.signup-form h2{
font-size:30px;
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
    <h2>Register User</h2>
    <p class="hint-text">Create your account.</p>
        <div class="form-group">
        <input type="text" class="form-control" name="name" placeholder="Full  Name" value="<?php if(isset($name)){echo $name;} ?>"  <?php if(isset($code) && $code == 1){ echo "autofocus"; }  ?> required="required">
      </div>
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php if(isset($email)){echo $email;} ?>" <?php if(isset($code) && $code == 3){ echo "autofocus"; }  ?> required="required">
        </div>

        <div class="form-group">
          <input type="tel" class="form-control" name="mobile" placeholder="Mobile Number" value="<?php if(isset($mobile)){echo $mobile;} ?>"  <?php if(isset($code) && $code == 2){ echo "autofocus"; }  ?>
          required="required">
        </div>

    <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" value="<?php if(isset($password)){echo $password;} ?>"  <?php if(isset($code) && $code == 4){ echo "autofocus"; }  ?> required="required">
        </div>
    <div class="form-group">
            <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" value="<?php if(isset($cpassword)){echo $cpassword;} ?>"  <?php if(isset($code) && $code == 5){ echo "autofocus"; }  ?>required="required">
        </div>        
        <div class="form-group">
      <div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block" name="submit">Register Now</button>
        </div>
    </form>
  
</div>
</body>
</html>


 