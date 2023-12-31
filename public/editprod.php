<?php
include("ses_check.php");
include("dbconnection.php");

$sql = ("SELECT * FROM  products  where delete_status=0 and id='".$_GET['id']." '");
$result=$conn->query($sql)->fetch_assoc();

$sql1 = ("SELECT * FROM  categories  where delete_status=0");
$result1 = mysqli_query($conn, $sql1);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Product | MeroPasal</title>
  <script src="loder.js"></script>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <link rel="stylesheet" href="style/user.css" type="text/css" />
  <style media="screen">
    .form-lb{
      display: block;
      margin-left: 5% ;
      margin-top: 2vh;
      font-size: 18px;
    }
    .form-control{
      margin-top: 0;
    }
  </style>
</head>
<div id="load"></div>

<body>
  <?php require("menu.php"); ?>
  <h1 id="p-title">Edit Product</h1>
  <div class="body">
    <br>
    <div class="form-container">
      <form action="prodedited.php?id=<?php echo $_GET['id'];?>" method="post">
        <label class="form-lb">Name</label>
        <input class="form-control" name="name" placeholder="Enter Product Name" value="<?php echo $result['name']?>" required>
        <label class="form-lb">Select Category</label>
        <select name="cat_id" class="form-control" id="categorie_id" required>
          <?php
       while ($row = mysqli_fetch_assoc($result1)) { ?>
          <option value="<?php echo $row['id']; ?>" <?php if($row['id']==$result['cat_id']){echo'selected'; } ?> ><?php echo $row['name']; ?></option>";
          <?php } ?>
          ?>
        </select>
        <label class="form-lb">Quantity</label>
        <input type="number" class="form-control" name="quantity" value="<?php echo $result['quantity']?>" required>
        <label class="form-lb">Buying Price</label>
        <input type="number" class="form-control" name="buy_price" value="<?php echo $result['buy_price']?>" required>
        <label class="form-lb">Saling Price</label>
        <input type="number" class="form-control" name="sale_price" value="<?php echo $result['sale_price']?>" required>
        <center>
          <button type="submit" class="btn btn-success" name="btn">Submit</button>
        </center>
      </form>
    </div>
  </div>
</body>
</html>
