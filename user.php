<?php 
session_start();

    if (!isset($_SESSION['admin_email']) ||(trim ($_SESSION['admin_email']) == '')) {
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
$query2 = "SELECT count(*) as CntIssuedBook FROM issued_details";
$query_run2 = mysqli_query($con, $query2);
$row2 = mysqli_fetch_assoc($query_run2);

#Count total users
$query3 = "SELECT count(*) as cntUsers FROM users";
$query_run3 = mysqli_query($con, $query3);
$row3 = mysqli_fetch_assoc($query_run3);

#Count pending Request
$query4 = "SELECT count(*) as cntRequests FROM book_request";
$query_run4 = mysqli_query($con, $query4);
$row4 = mysqli_fetch_assoc($query_run4);

$query5 = "SELECT name,count(*) as adminCount FROM admin_data";
$query_run5 = mysqli_query($con, $query5);
$row5 = mysqli_fetch_assoc($query_run5);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
   <title>Admin</title>

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style1.css">




<style>
img {
    margin-top: 60px;
    margin-bottom: 20px;
      display: block;
      margin-left: auto;
      margin-right: auto;
}
.container .social-container .box-container p{        
            font-size: 27px;
            font-weight: 400;
}
</style>

</head>
<body>
      <!-- header section ends -->
<section class="header">

   <a href="#" class="logo" style="color:orange;">Libraryquip</a>

                  <a href="logout.php" class="btn" style="background-color: ;">Logout</a>
</section>

<!-- header section ends -->

<!-- Admin section start -->


<div class="container">

    <div class="box-container">

        <div class="box">
         <svg  xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="slateblue" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
</svg>
            
            <h3>Registered Users</h3>
            <p style="font-size: 30px"><?php echo $row3['cntUsers'];?></p>
            <a href="admin/registeredUser.php" class="btn" style="background-color: slateblue;" >read more</a>
        </div>

        <div class="box">
            
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="orange" class="bi bi-book-fill" viewBox="0 0 16 16">
  <path d="M8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg>
            <h3>Total Books</h3>
            <p style="font-size: 30px"><?php echo $row['bookCount'];?></p>
            <a href="admin/manage_book.php" class="btn" style="background-color: orange;">read more</a>
        </div>

        <div class="box">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="orangered" class="bi bi-bookshelf" viewBox="0 0 16 16">
  <path d="M2.5 0a.5.5 0 0 1 .5.5V2h10V.5a.5.5 0 0 1 1 0v15a.5.5 0 0 1-1 0V15H3v.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 .5-.5zM3 14h10v-3H3v3zm0-4h10V7H3v3zm0-4h10V3H3v3z"/>
</svg>
            <h3>Issue a book </h3>
            <p style="font-size: 20px">Issue a book for student</p><br>
            <a href="admin/issue_book.php" class="btn"style="background-color: orangered;">read more</a>
        </div>

        <div class="box">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="darkgreen" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
            <h3>Book Issued</h3>
            <p style="font-size: 30px"><?php echo $row2['CntIssuedBook'];?></p>
            <a href="admin/manage_issued_details.php" class="btn"style="background-color: darkgreen;">read more</a>
        </div>

        <div class="box">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="green" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 1 0z"/>
</svg>
            <h3>Add Books</h3>
            <p style="font-size: 20px">Add a new book</p><br>
            <a href="admin/add_book.php" class="btn"style="background-color: green;">read more</a>
        </div>


         <div class="box">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
            <h3>Profile</h3>
            <p style="font-size: 20px">Welcome <?php echo $row5['name'];?></p><br>
            <a href="admin/admin_profile.php" class="btn" style="background-color: black;">read more</a>
        </div>


        <div class="box">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="dodgerblue" class="bi bi-bell-fill" viewBox="0 0 16 16">
        <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
            </svg>
            <h3>Pending Request</h3>
            <p style="font-size: 30px"><?php echo $row4['cntRequests'];?></p>
            <a href="admin/pending_requests.php" class="btn" style="background-color: dodgerblue;">read more</a>
        </div>

        <div class="box">
           <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="#E74C3C" class="bi bi-people-fill" viewBox="0 0 16 16">
  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
</svg>

            <h3>Admin</h3>
            <p style="font-size: 30px"><?php echo $row5['adminCount'];?></p><br>
            <a href="admin/manage_admin.php" class="btn" style="background-color:#E74C3C ;">read more</a>
        </div>

    </div>

</div>

<!-- Admin section end -->


</body>

</html>