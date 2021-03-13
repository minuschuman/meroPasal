<?php
session_start();
include("dbconnection.php");
$uname = $_POST['name'];
$pass  = md5($_POST['pass']);

$sql="SELECT * FROM users WHERE  password='$pass' and username='$uname'";

$result=mysqli_query($conn,$sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = $result->fetch_assoc();
    /*storing data for later*/
    $_SESSION['last_login'] = $row['last_login'];
    $_SESSION['id']= $row['id'];
    $_SESSION['username']=$row['username'];
    $_SESSION['password']=$row['password'];
    $today = date("Y-m-d h:i:sa");

    $sql1="UPDATE users set last_login='$today' where id='".$_SESSION['id']."'";
    $result=$conn->query($sql1);

    header("location:superDashboard.php");
} else {?>
  <script>
		alert('Invalid User or Password...');
		window.location='index.php';
	</script>
<?php }

?>
