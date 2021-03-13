<?php
include("dbconnection.php");

$today = date("Y-m-d h:i:sa");
echo "Current date and time is ".$today;

$sql="INSERT INTO products(name, quantity, buy_price, sale_price, cat_id, date)
values ('".$_POST['name']."', '".$_POST['quantity']."', '".$_POST['buy_price']."', '".$_POST['sale_price']."', '".$_POST['categorie_id']."', '". $today."')";
if($conn->query($sql)==TRUE){
  echo"Record Inserted Sucessfully ";?>
  <script>window.location='product.php';</script>
<?php
}else
  echo "Something Wrong" . $conn->error;
?>
