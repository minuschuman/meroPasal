<?php
if ($_SESSION['user']!=1) {
  header("location:404Error.php");
  echo "something went Wrong";
}

?>
