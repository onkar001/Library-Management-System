<?php 
session_start();
$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

if (isset($_POST['submit'])) {

    $name=$_POST['name'];
    $book_name=$_POST['book_name'];
    $book_category=$_POST['book_category'];
    $student_id=$_POST['student_id'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];


        $sql = "INSERT INTO `book_request`(`name`, `book_name`,`book_category`,`student_id`,`email`,`mobile` ) VALUES (' $name','$book_name','$book_category','$student_id','$email','$mobile')";            
                    $sql_con =mysqli_query($con,$sql);
                    echo "<script>
                     alert('Request for issuing book is send successfully!!');
                      document.location.href = '../normalUser.php';

                     </script>
                     ";
                

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book Request</title>

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
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Book Registration </h3>

            <form class="px-md-2" method="post">

              <div class="form-outline mb-4">
              	<label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required />
               
              </div>

              <div class="form-outline mb-4">
              	<label class="form-label" >Book Name</label>
                <input type="text"  name="book_name"class="form-control" required />
               
              </div>

            <div class="row">
                <div class="col-md-6 mb-4">

                   <div class="form-outline mb-4">
              			<label class="form-label" >Book Category</label>
                		<input type="text"  name="book_category" class="form-control"required />
               
                   </div>

                </div>

                <div class="col-md-6 mb-4">

                	<div class="form-outline mb-4">
              			<label class="form-label" >Student ID</label>
                		<input type="text"  name="student_id" class="form-control"required />
               
                   </div>

                </div>

            </div>
                  <div class="form-outline mb-4">
                     <label class="form-label" >Email ID</label>
                    <input type="email" name="email" class="form-control form-control-lg" required />
                    
                </div>
              
               <div class="form-outline mb-4">
                     <label class="form-label">Phone Number</label>
                    <input type="tel" name="mobile" class="form-control form-control-lg" required />
                    
                </div>

              <button type="submit" name="submit" class="btn btn-success btn-lg mb-1">Submit</button>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>





</body>
</html>