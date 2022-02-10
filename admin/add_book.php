<?php 

$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

if (isset($_POST['submit']) && isset($_FILES['book_image'])) {

    $book_name=$_POST['book_name'];
    $book_category=$_POST['book_category'];
    $book_author=$_POST['book_author'];
    $isbn=$_POST['isbn'];
    $pricing=$_POST['pricing'];

  $book_image = $_FILES['book_image']['name'];
  $error = $_FILES['book_image']['error'];

  $allowed_extension=array("jpg", "jpeg", "png","gif");
  $filename=$_FILES['book_image']['name'];
  $file_extension=pathinfo($filename,PATHINFO_EXTENSION);

if(!in_array($file_extension,$allowed_extension)){
    echo
        "<script>
          alert('You are allowed with only jpeg jpg png gif ');
            </script>";
}


  if ($error === 0) {
          if (file_exists("upload/".$_FILES['book_image']['name'])) {
          echo
        "<script>
          alert('Image already Exists.');
            </script>
            ";
          }else {
                  move_uploaded_file($_FILES['book_image']['tmp_name'], "upload/".$_FILES['book_image']['name' ]);

                  $sql = "INSERT INTO `added_book`(`book_name`, `book_category`,`book_author`,`ISBN`,`price`,`book_image` ) VALUES (' $book_name','$book_category','$book_author','$isbn','$pricing','$book_image')";            
                    $sql_con =mysqli_query($con,$sql);
                    if($sql_con){
                    echo "<script>
                     alert('Book is added Successfully!!');
                     document.location.href = '../user.php';
                     </script>
                     ";
                }else {
                  echo "<script>
                 alert('Invalids file Extension.');
                 </script>
                 ";
                }
          }
                  }else {
         echo "<script>
          alert('Error Occured');
            </script>
            ";
             }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a Book Page</title>

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


    <!--------- Add Book Form ------->
<section class="h-100 h-custom" style="background-color:  #FFDEAD;" >
  <div class="container py-5 h-100 ">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-8">
        <div class="card rounded-3">
          <img src="https://www.theasianschool.net/blog/wp-content/uploads/2020/03/Importance-Of-Books-In-Students-Life.jpg" class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;" alt="Sample photo">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2">Add Book </h3>

            <form class="px-md-2" method="post" action="" enctype="multipart/form-data">

              <div class="form-outline mb-4">
                <label class="form-label">Book Name</label>
                <input type="text" name="book_name" placeholder="Enter Book Name" class="form-control" />
               
              </div>

            <div class="row">
                <div class="col-md-6 mb-4">

                   <div class="form-outline mb-4">
                        <label class="form-label">Book Category</label>
                        <input type="text" name="book_category" placeholder="Enter Book Category" class="form-control" />
               
                   </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline mb-4">
                        <label class="form-label">Book Author</label>
                        <input type="text" name="book_author"  placeholder="Enter Book Author Name" class="form-control" />
               
                   </div>

                </div>

            </div>

            <div class="row">
                <div class="col-md-6 mb-4">

                   <div class="form-outline mb-4">
                        <label class="form-label">ISBN No</label>
                        <input type="text" name="isbn" placeholder="Enter ISBN No" class="form-control" />
               
                   </div>

                </div>

                <div class="col-md-6 mb-4">

                    <div class="form-outline mb-4">
                        <label class="form-label">Price</label>
                        <input type="text" name="pricing" placeholder="Enter Book Price" class="form-control" />
               
                   </div>

                </div>

            </div>


               <div class="form-outline mb-4">
                     <label class="form-label">Book Picture</label><br>
                    <input type="file" name="book_image" />                    
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