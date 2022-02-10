<?php
$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM book_request WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
         echo
        "<script>
          alert('Your Data is deleted');
          document.location.href = '../user.php';
            </script>
            ";
    }
    else
    {
      echo
        "<script>
          alert('Your Data is not deleted');
          document.location.href = 'manage_book.php';
            </script>
            ";
    }    
}
?>