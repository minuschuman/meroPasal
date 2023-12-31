<?php
include("ses_check.php");
include("dbconnection.php");

$sql="UPDATE products  set delete_status='1' where id='".$_GET['id']."'";
echo 'Deleted successfully.';
if ($conn->query($sql)) {
    ?>
  	<script>alert ("Record Deleted");</script>
  <?php
  header('location:product.php');
} else {
    echo "Not Deleted";
}
