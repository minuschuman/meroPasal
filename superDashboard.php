<?php
  include("superinclude.php");
 ?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="jquery-3.5.1.js"></script>
  <script src="loder.js"></script>

  <style></style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Dashboard | MeroPasal</title>
</head>

<div id="load"></div>
<body>
  <div class="nav">
    <h1 id="myName">MeroPasal</h1>
    <!--dl>
      <dt>fire</dt>
      <dd>ylo</dd>
      <dd>red</dd>
    </dl-->
    <ul>
      <a href="#" class="activeMenuItem">
        <li id="act">Dashboard</li>
      </a>
      <a href="User.php" class="activeMenuItem">
        <li id="menu-user">Users</li>
      </a>
      <a href="categories.php" class="activeMenuItem">
        <li id="menu">Categories</li>
      </a>
      <a href="Product.php" class="activeMenuItem">
        <li id="act">Products</li>
      </a>
      <a href="Sales.php" class="activeMenuItem">
        <li id="act">Sales</li>
      </a>
      <li id="out-btn"><a href="ses_clear.php" onclick="return confirm('Are you sure you want to logout?')">Log Out</a></li>
    </ul>
  </div>
  <div class="body">
    <h1 id="p-title">Dashboard</h1>
    <div id="body" class="Dashboard">
      <div class="panel-set">
        <div class="u-panel">
          <div class="user panel">
            <h4 id="num"><?php echo $row_user['user_id'];?></h4>
            <h6 id="txt">User</h6>
          </div>
          <div class="categorie panel">
            <h4 id="num"><?php echo $row_cat['cat_id'];?></h4>
            <h6 id="txt">Categories</h6>
          </div>
        </div>
        <div class="l-panel">
          <div class="product panel">
            <h4 id="num"><?php echo $row_prod['prod_id'];?></h4>
            <h6 id="txt">Product</h6>
          </div>
          <div class="sale panel">
            <h4 id="num"><?php echo $row_sales['sales_id'];?></h4>
            <h6 id="txt">Sales</h6>
          </div>
        </div>
        <!--l-panel-->
      </div>
      <!--panel-set-->

      <!--div class="highest-table">
        <table class="table" border='1' cellpadding='0' cellspacing='0'>
          <caption>
            <h2>Highest Sold Products</h2>
          </caption>
          <thead>
            <tr>
              <th>Title</th>
              <th>Total Quntity</th>
              <th>Total sale</th>
            </tr>
          </thead>
          <tbody>
            <?php
               foreach ($result_N as $row_N){ ?>
            <tr>
              <td><?php echo $row_N['name']; ?></td>
              <td><?php echo $row_N['totalQty']; ?></td>
              <td><?php echo $row_N['totalSold']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!--highest-table-->
      <div class="latest-table">
        <table class="table"  cellpadding='0' cellspacing='0'>
          <caption>
            <h2>Latest Sale</h2>
          </caption>
          <thead>
            <tr>
              <th>#</th>
              <th>Product Name</th>
              <th>Date</th>
              <th>Total Sale</th>
            </tr>
          </thead>
          <tbody>
            <?php
               foreach ($result_LS as $row_LS){
            ?>
            <tr>
              <td><?php echo $row_LS['id']; ?></td>
              <td>
                <!--a href="editsales.php?id=<?php echo $row6['id']; ?>"-->
                  <?php echo $row_LS['name']; ?>
                <!--/a-->
              </td>
              <td><?php echo $row_LS['date']; ?></td>
              <td><?php echo $row_LS['price']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!--latest-table-->
    </div>
    <!--Dashboard-->
  </div>
  <!--body-->
</body>

</html>
