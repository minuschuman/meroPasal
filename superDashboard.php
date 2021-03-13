<?php
include("ses_check.php");

include("dbconnection.php");
/*******accessing user table*****/
$sql="SELECT COUNT(id) as user_id FROM users WHERE delete_status='0' AND status='1'";
$result_user=$conn->query($sql);
$row_user=$result_user->fetch_assoc();

/**************categories*******************/
$sql_cat="SELECT  COUNT(id) as cat_id FROM categories WHERE delete_status='0'";
$result_cat=$conn->query($sql_cat);
$row_cat=$result_cat->fetch_assoc();

/**************product**************/
$sql_prod="SELECT  COUNT(id) as prod_id FROM products WHERE delete_status='0'";
$result_pord=$conn->query($sql_prod);
$row_prod=$result_pord->fetch_assoc();

/*************sales***********************/
$sql_sales="SELECT count(id) as sales_id from sales where delete_status='0' ";
$result_sales=$conn->query($sql_sales);
$row_sales=$result_sales->fetch_assoc();

/*****************highest sales****************/
$sql_N="SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty FROM sales s LEFT JOIN products p ON p.id = s.product_id where s.delete_status=0 GROUP BY s.product_id";
$result_N=$conn->query($sql_N);
/**************************/
$sql_LS="SELECT s.id,s.qty,s.price,s.date,p.name FROM sales s LEFT JOIN products p ON s.product_id = p.id where s.delete_status=0 GROUP BY s.product_id ORDER BY SUM(s.qty) DESC LIMIT 5 ";
$result_LS=$conn->query($sql_LS);

/************IF require recently added******************
$sql_LS="SELECT p.id,p.name,p.sale_price,c.name AS categorie FROM products p LEFT JOIN categories c ON c.id = p.cat_id where p.delete_status=0 ORDER BY c.id DESC LIMIT 3";
$result_LS=$conn->query($sql_LS);
****************/
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <style>



  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Dashboard | MeroPasal</title>
</head>

<body>
  <div class="nav">
    <h1 id="myName">MeroPasal</h1>
    <!--dl>
      <dt>fire</dt>
      <dd>ylo</dd>
      <dd>red</dd>
    </dl-->
    <ul>
      <a href="#">
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
      <li id="out-btn"><a href="ses_clear.php">Log Out</a></li>
    </ul>
  </div>
  <div class="body">
    <h1 id="p-title">Dashboard</h1>
    <hr>
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

      <div class="highest-table">
        <table class="table" border='1' cellpadding='0' cellspacing='0'>
          <caption>
            <h2>Highest Sold Products</h2>
          </caption>
          <thead>
            <tr>
              <th>Title</th>
              <th>Total Sold</th>
              <th>Total Quantity</th>
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
        <table class="table" border='1' cellpadding='0' cellspacing='0'>
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
                <a href="editsales.php?id=<?php echo $row6['id']; ?>">
                  <?php echo $row_LS['name']; ?>
                </a>
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
