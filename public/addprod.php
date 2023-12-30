<?php
include("ses_check.php");

include("dbconnection.php");
$sql = ("SELECT * FROM  categories  where delete_status=0 ");
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Product | MeroPasal</title>
  <script src="loder.js"></script>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <link rel="stylesheet" href="style/user.css" type="text/css" />
</head>
<div id="load"></div>

<body>
  <?php require("menu.php"); ?>
  <h1 id="p-title">Add Product</h1>
  <div class="body">
    <br>
    <div class="form-container">
      <form role="form" action="prodadded.php" method="post">
        <input class="form-control" name="name" placeholder="Enter Product Name" required>
        <select name="categorie_id" class="form-control" id="categorie_id" required>
          <option value=''>Select Category</option>
          <?php
       while ($row = mysqli_fetch_assoc($result)) { ?>
          <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>";
          <?php } ?>
          ?>
        </select>
        <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity" required>
        <input type="number" class="form-control" name="buy_price"  placeholder="Buying Price">
        <input type="number" class="form-control" name="sale_price"  placeholder="Saling Price">
        <center>
          <button type="submit" class="btn btn-success" name="btn">Submit</button>
        </center>
      </form>
    </div>
  </div>
</body>
</html>
