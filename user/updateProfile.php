<?php
$con=mysqli_connect("localhost", "root", "", "studentdata");
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}

if(isset($_POST['updatebtn']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile= $_POST['mobile'];
    $password = $_POST['password'];


    $query = "UPDATE users SET name='$name', email='$email', password='$password' , mobile='$mobile' WHERE id='$id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        echo
        "
          <script>
          alert('Your Data is Updated');
          document.location.href = '../normalUser.php';
            </script>
            ";
    }
    else
    {
echo
        "
          <script>
          alert('Your Data is not Updated');
          document.location.href = 'updateProfile.php';
            </script>
            ";    
        }
}

?>