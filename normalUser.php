<?php 


session_start();


if (!isset($_SESSION['user_email']) ||(trim ($_SESSION['user_email']) == '')) {
        header('location:home.php');
        exit();
    }

$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}




#total available books count
$query = "SELECT count(*) as bookCount FROM added_book";
$query_run = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($query_run);

#Issued books count
$query2 = "SELECT count(*) as CntIssuedBook FROM issued_details where student_id=".$_SESSION['student_id']." ";
$query_run2 = mysqli_query($con, $query2);
$row2 = mysqli_fetch_assoc($query_run2);

#Get the name of User
$query3 = "SELECT name FROM users where id=".$_SESSION['student_id']." ";
$query_run3 = mysqli_query($con, $query3);
$row3 = mysqli_fetch_assoc($query_run3);


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>User Page</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style1.css">

<script language="javascript" type="text/javascript">
     window.history.backward();
</script>

<style>
    .container .social-container .box-container p{        
            font-size: 27px;
            font-weight: 400;
}
</style>



</head>
<body>
    <section class="header">

   <a href="#" class="logo" style="color:orange;">Libraryquip</a>
  <a href="logout_user.php" class="btn" style="background-color: ;">Logout</a>
</section>

<div class="container">
    <div class="social-container">
    <p class="heading" style="color:black;">WELCOME TO LIBRARY MANAGEMENT SYSTEM</p>

    <div class="box-container">
        
        <div class="box">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="darkgreen" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
            <h3>Book Issued</h3>
            <p><?php echo $row2['CntIssuedBook'];?></p>             
            <a href="user/user_issued_book.php" class="btn"style="background-color: darkgreen;">read more</a>
        </div>

        <div class="box">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="orange" class="bi bi-book-fill" viewBox="0 0 16 16">
  <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg>
            <h3>Total Books</h3>
            <p><?php echo $row['bookCount'];?></p>             
            <a href="user/book_list.php" class="btn" style="background-color: orange;">read more</a>
        </div>


         <div class="box">
            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="dodgerblue" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h3>Profile</h3>
            <p style="font-size: 20px;">Welcome <?php echo $row3['name'];?></p><br>            
            <a href="user/profile_page.php" class="btn" style="background-color: dodgerblue;">read more</a>
        </div>

         <div class="box">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="black" class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
  <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z"/>
</svg>
            <h3>Book Request</h3>
            <p style="font-size:20px">Request a book</p><br>
            <a href="user/book_request.php" class="btn" style="background-color: black;">read more</a>
        </div>

        

    </div>

</div>

<!-- Admin section end -->


</body>




</html>