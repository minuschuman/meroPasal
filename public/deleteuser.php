<?php
include("ses_check.php");
include("dbconnection.php");

$sql="UPDATE users set delete_status='1' where id='".$_GET['id']."'";
echo 'Deleted successfully.';
if($conn->query($sql))
{?>
	<script>alert ("Record Deleted");</script>
<?php }else
{
	echo "Not Deleted";
}
header('location:user.php');
?>
