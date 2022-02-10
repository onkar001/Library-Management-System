<?php
$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $book_name = $_POST['edit_book_name'];
    $book_category = $_POST['edit_book_category'];
    $book_author=$_POST['edit_book_author'];
    $isbn=$_POST['edit_isbn'];
    $price = $_POST['edit_pricing'];

    $book_image = $_FILES['book_image']['name'];
    $old_image = $_POST['book_image_old'];

    if($book_image!=''){
      $allowed_extension=array("jpg", "jpeg", "png","gif");
      $filename=$_FILES['book_image']['name'];
      $file_extension=pathinfo($filename,PATHINFO_EXTENSION);

    if(!in_array($file_extension,$allowed_extension)){
    echo
        "<script>
          alert('You are allowed with only jpeg jpg png gif ');
            </script>";
      }

      if (file_exists("upload/".$_FILES['book_image']['name'])) {
          echo
        "<script>
          alert('Image already Exists.');
            </script>
            ";
          }

      $update_filename=$_FILES['book_image']['name'];
    }
    else{
      $update_filename=$old_image;
    }

  $error = $_FILES['book_image']['error'];

                  $sql = "UPDATE added_book SET book_name='$book_name', book_category='$book_category', book_author='$book_author',ISBN='$isbn',price='$price',book_image='$update_filename'WHERE id='$id' ";;            
                    $sql_con =mysqli_query($con,$sql);
                    if($sql_con){
                      if($_FILES['book_image']['name']!=''){
                    move_uploaded_file($_FILES['book_image']['tmp_name'], "upload/".$_FILES['book_image']['name' ]);
                    unlink("upload/".old_image);
                  }
                  echo "<script>
                    alert('Data is Updated Successfully!!');
                  document.location.href = 'manage_book.php';
                  </script>";
                  exit();
                }else {
                  echo "<script>
                 alert('Image is not updated');
                 </script>
                 ";
                }
          }
    


?>