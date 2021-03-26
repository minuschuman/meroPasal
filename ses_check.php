<?php
session_start();
$id=$_SESSION['id'];
require 'dbconnection.php';
$sql="SELECT `delete_status` FROM users WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row = $result->fetch_assoc();
$_SESSION['active']=$row['delete_status'];


if((!isset($_SESSION['username']))||($_SESSION['active']==1)){
	header("location:index.php");
}
?>
