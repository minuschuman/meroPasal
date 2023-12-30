<?php
session_start();
include("dbconnection.php");
$uname = $_POST['name'];
$pass  = md5($_POST['pass']);

$sql="SELECT * FROM users WHERE  password='$pass' and username='$uname'";

$result=mysqli_query($conn,$sql);
a:
date_default_timezone_set("Asia/Kathmandu");
if ($result && mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['active']=$row['delete_status'];
    if($_SESSION['active']==0){
    	//header("location:index.php");
      /*storing data for later*/
      $_SESSION['last_login'] = $row['last_login'];
      $_SESSION['id']= $row['id'];
      $_SESSION['username']=$row['username'];
      $_SESSION['password']=$row['password'];
      $_SESSION['name']=$row['name'];
      $_SESSION['user']=$row['user_level'];


      $today = date("Y-m-d h:i:sa");

      $sql1="UPDATE users set last_login='$today' where id='".$_SESSION['id']."'";
      $result=$conn->query($sql1);

      if($_SESSION['user'] == 1) {
        header("location:superDashboard.php");
      }
      else {
        header("location:Sales.php");
      }
    }
    else {
      $result=0;
      goto a;
    }
} else {?>
  <script>
		alert('Invalid User or Password...');
    window.location='index.php';
	</script>
<?php }

?>
