<?php
$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
 session_start();
$id=$_SESSION['student_id'];
$query=mysqli_query($con,"SELECT * FROM users where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Page</title>

	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


	<style>
		@media (min-width: 1025px) {
  .h-custom {
    height: 150vh !important;
  }
}
	</style>

</head>
<body>


	<!--------- Book Request Form  ------->
<section class="h-100 h-custom" style="background-color:  #FFDEAD;" >
  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card rounded-3">
          <img src="https://elibrary.iiitn.ac.in/images/library.png" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">User Profile </h3>

            <form class="px-md-2" method="post" action='updateProfile.php'>
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

              <div class="form-outline mb-4">
              	<label class="form-label" for="form3Example1q">Name</label>
                <input type="text" class="form-control"  name="name" value="<?php echo $row['name']?>" placeholder="Name" required>               
              </div>

              <div class="form-outline mb-4">
              	<label class="form-label" for="form3Example1q">Email</label>
                <input type="text" class="form-control"  name="email" value="<?php echo $row['email'] ?>" placeholder="Email" required>
               
              </div>

            <div class="row">
                <div class="col-md-6 mb-4">

                   <div class="form-outline mb-4">
              			<label class="form-label" for="form3Example1q">Mobile Number</label>
                    <input type="text" class="form-control"  name="mobile" value="<?php echo $row['mobile'] ?>" placeholder="Mobile Number" required>               
                   </div>

                </div>

                <div class="col-md-6 mb-4">

                	<div class="form-outline mb-4">
              			<label class="form-label" for="form3Example1q">Password</label>
                    <input type="text" class="form-control"  name="password" value="<?php echo $row['password'] ?>" placeholder="Password" required>               
                   </div>

                </div>

            </div>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>





</body>
</html>