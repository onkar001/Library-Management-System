<?php 

$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

if (isset($_POST['submit'])) {

    $student_name=$_POST['student_name'];
    $student_id=$_POST['student_id'];
    $issued_date=$_POST['issued_date'];
    $return_date=$_POST['return_date'];
    $isbn=$_POST['isbn'];
    $book_name=$_POST['book_name'];


        $sql = "INSERT INTO `issued_details`(`student_name`, `student_id`,`issued_date`,`return_date`,`ISBN`,`book_name` ) VALUES (' $student_name','$student_id','$issued_date','$return_date','$isbn','$book_name')";            
                    $sql_con =mysqli_query($con,$sql);
                    echo "<script>
                     alert('Book is Issued Successfully!!');
                    document.location.href = '../user.php';
                     </script>
                     ";

}
?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Issue book Page</title>


 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



  <style>
    .gradient-custom {
  /* fallback for old browsers */
  background: #f093fb;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to bottom right, rgba(240, 147, 251, 1), rgba(245, 87, 108, 1))
}

.card-registration .select-input.form-control[readonly]:not([disabled]) {
  font-size: 1rem;
  line-height: 2.15;
  padding-left: .75em;
  padding-right: .75em;
}
.card-registration .select-arrow {
  top: 13px;
}

  </style>

</head>
<body>

  <section class="vh-100 h-custom" style="background-color:#FFDEAD">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Book Issue Form</h3>
            <form method="post" >

              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label">Student Name</label>
                    <input type="text" name="student_name" class="form-control form-control-lg"required />
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <label class="form-label" for="lastName">Student ID</label>
                    <input type="text" name="student_id" class="form-control form-control-lg" required />
                    
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline datepicker w-100">
                    <label  class="form-label">Issue Date</label>
                    <input  type="date" class="form-control form-control-lg" name="issued_date"
                    required/>
                   
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                 <div class="form-outline datepicker w-100">
                    <label class="form-label">Return Date</label>
                    <input type="date" class="form-control form-control-lg" name="return_date"
                   required />
                   
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <label class="form-label"> ISBN No</label>
                    <input type="text" name="isbn" class="form-control form-control-lg" required/>
                    
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <label class="form-label">Book Name</label>
                    <input type="text" name="book_name" class="form-control form-control-lg" required />
                    
                  </div>

                </div>
              </div>

              

              <div class="mt-4 pt-2">
                <input class="btn btn-primary btn-lg" id="submit" type="submit" name="submit" />
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>



</body>
</html>