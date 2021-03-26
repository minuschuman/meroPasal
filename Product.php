<?php
include("ses_check.php");

include("dbconnection.php");

$sql= "SELECT * from  products where delete_status='0' ORDER BY id DESC";

$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="loder.js"></script>
  <style>



  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Product | MeroPasal</title>
</head>
<div id="load"></div>
<body>
  <div class="nav">
    <h1>MeroPasal</h1>
    <ul>
      <a href="superDashboard.php">
        <li id="act">Dashboard</li>
      </a>
      <a href="User.php">
        <li id="menu-user">Users</li>
      </a>
      <a href="categories.php">
        <li id="menu">Categories</li>
      </a>
      <a href="Product.php">
        <li id="act">Products</li>
      </a>
      <a href="Sales.php">
        <li id="act">Sales</li>
      </a>
      <li id="out-btn"><a href="#">Log Out</a></li>
    </ul>
  </div>
  <div class="body">
    <h1 id="p-title">Product</h1>
    <hr>
    <div id="Product">
      <div class="addprod">
        <a href="addprod.php"><button class="add-btn">+ Add New</button></a>
      </div>
      <table class="table" border='1' cellpadding='0' cellspacing='0'>
        <thead>
          <tr>
            <th>Id</th>
            <th>Product Name</th>
            <th>Instock</th>
            <th>Buying Prize</th>
            <th>Saleing Price</th>
            <th>Product Added</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($result as $row) {
          $sql="SELECT * from categories where id='".$row['cat_id']." '";
          $result1=$conn->query($sql);
          $row1=$result1->fetch_assoc();
          ?>
          <tr class="odd gradeX">
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['buy_price']; ?></td>
            <td><?php echo $row['sale_price']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
              <a href="editproduct.php?id=<?php echo $row['id']?>"><input id="edit" type="submit" name="edit" value="Edit" /></a>
              <a href="deleteproduct.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure to delete this record?')">
                <input id="delete" type="submit" name="Delete" value="Delete"/>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!--Product-->
  </div>
  <!--body-->
</body>

</html>
