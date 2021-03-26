<?php
include("ses_check.php");
include("dbconnection.php");

$sql="UPDATE categories  set name='".$_POST['name']."' where id = '".$_POST['id']."'";
$result=$conn->query($sql);

header('location:categories.php');
?>
