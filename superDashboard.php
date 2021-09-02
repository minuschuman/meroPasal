<?php
  include("superinclude.php");
  require_once("userlevel.php");
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
  <?php
  $page ='one';
  require("menu.php"); ?>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
            <h4 id="num">Rs. <?php echo $row_sales['day_sale'];?></h4>
            <h6 id="txt">Todays Sales</h6>
          </div>
        </div>
        <!--l-panel-->
      </div>
      <!--panel-set-->
      <div id="chartContainer" style="height: 370px; width: 80%;"></div>
      <!-- Chart -->

      <div class="highest-table">
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
              <th>Customer Name</th>
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
      <div id = "yearsale">
        <table class="table"  cellpadding='0' cellspacing='0'>
          <caption>
            <h2>Sales Report of <?= date("Y") ?></h2>
          </caption>
          <thead>
            <tr>
              <!-- <th>#</th> -->
              <th>Month</th>
              <th>Total Sale</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($result_msale as $row_msale){ ?>
            <tr>
              <!-- <td><?= "test"?></td> -->
              <td><?php echo $row_msale['date']; ?></td>
              <td><?php echo $row_msale['price']; ?></td>
            </tr>
          <?php } ?>
        </tbody>
        </table>
      </div>
      <style>
      #rpt-link{
        text-align: center;
        margin-bottom: 5vh;
        margin-top: 3vh;
      }
      #rpt-link a{
        background-color: #42b72a;
        color:black;
        padding: 10px;
      }
      #rpt-link a:link{
        text-decoration:none;
      }
      </style>
      <hr style="width:90%; margin:auto; padding-top=0">
      <div id="rpt-link"><a href="report.php">→ View More</a></div>
    </div>
    <!--Dashboard-->
  </div>
  <!--body-->

</body>

</html>
