<?php
$inactive = 300;
ini_set('session.gc_maxlifetime', $inactive);
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


// 2 hours in seconds
// $inactive = 7200;
// ini_set('session.gc_maxlifetime', $inactive); // set the session max lifetime to 2 hours


if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
	// session_start();
    // last request was more than 2 hours ago
    session_unset();     // unset $_SESSION variable for this page
    session_destroy();   // destroy session data
}
$_SESSION['testing'] = time(); // Update session
?>
