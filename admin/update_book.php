<?php 

$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update book</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM added_book WHERE id='$id' ";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row)
                {
                    ?>

                <form style="margin-top: 100px; padding: 30px; align-items:center;" class="border border-dark" action="code_book.php" enctype="multipart/form-data" 
                method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                  
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="formGroupExampleInput">Book Name</label>
                    <input type="text" class="form-control"  name="edit_book_name" value="<?php echo $row['book_name'] ?>" placeholder="Book Name" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="formGroupExampleInput">Book Category</label>
                    <input type="text" class="form-control"  name="edit_book_category" value="<?php echo $row['book_category'] ?>"placeholder="Enter Category" required>
                  </div>

                  
                </div>

                    <div class="form-row">
                   <div class="form-group col-md-4">
                    <label for="formGroupExampleInput">Book Author</label>
                    <input type="text" class="form-control"  name="edit_book_author" placeholder="Book Author"  value="<?php echo $row['book_author'] ?>" required>
                  </div>
                    <div class="form-group col-md-4">
                      <label for="inputZip">ISBN Number</label>
                      <input type="text" class="form-control" value="<?php echo $row['ISBN'] ?>" name="edit_isbn">
                    </div>

                </div>

                    <div class="form-row">

                     <div class="form-group col-md-2">
                      <label for="inputZip">Pricing</label>
                      <input type="text" class="form-control"  value="<?php echo $row['price'] ?>"name="edit_pricing">
                    </div>

                  <div class="form-group col-md-4">
                    <label for="exampleFormControlFile1">Picture</label>
                    <input type="file"  class="form-control-file" name="book_image">
                    <input type="hidden"  class="form-control-file" value="<?php echo $row['book_image'] ?>" name="book_image_old">
                  </div>
                </div>

                            <a href="#" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>



                  </div>


                </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>

</body>
</html>