<?php
include("dbconnection.php");


  $pass=md5($_POST['password']);
  $sql="INSERT INTO  users(name, username, password, user_level, status) values('".$_POST['name']."','".$_POST['username']."','$pass','".$_POST['user_level']."','".$_POST['status']."')";
  if($conn->query($sql)==TRUE){
    echo"Record Inserted Sucessfully ";?>
    <script>
      window.location = 'user.php';
    </script>
<?php
  }else
    echo "Something Wrong" . $conn->error;
?>
