<?php
include("dbconnection.php");

$sql="UPDATE products set name='".$_POST['name']."', cat_id='".$_POST['cat_id']."', quantity='".$_POST['quantity']."', buy_price='".$_POST['buy_price']."', sale_price='".$_POST['sale_price']."' where id='".$_GET['id']."'";
$result=$conn->query($sql);
header('location:user.php');
?>
