<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <style>



  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Dashboard</title>
</head>

<body>
  <div class="nav">
    <h1>Billing System</h1>
    <!--dl>
      <dt>fire</dt>
      <dd>ylo</dd>
      <dd>red</dd>
    </dl-->
    <ul>
      <a href="#body">
        <li id="act">Dashboard</li>
      </a>
      <a href="#User">
        <li id="menu-user">Users</li>
      </a>
      <a href="#Categories">
        <li id="act">Categories</li>
      </a>
      <a href="#Product">
        <li id="act">Products</li>
      </a>
      <a href="#Sales">
        <li id="act">Sales</li>
      </a>
      <li id="out-btn"><a href="#">Log Out</a></li>
    </ul>
  </div>
  <div class="body">
    <div id="body" class="Dashboard">
      <h1>Dashboard</h1>
      <hr>
      <div class="panel-set">
        <div class="u-panel">
          <div class="user panel">
            <h4 id="num"><?php echo "1";//echo $row[''];?></h4>
            <h6 id="txt">User</h6>
          </div>
          <div class="categorie panel">
            <h4 id="num">2</h4>
            <h6 id="txt">Categories</h6>
          </div>
        </div>
        <div class="l-panel">
          <div class="product panel">
            <h4 id="num">3</h4>
            <h6 id="txt">Product</h6>
          </div>
          <div class="sale panel">
            <h4 id="num">4</h4>
            <h6 id="txt">Sales</h6>
          </div>
        </div>
        <!--l-panel-->
      </div>
      <!--panel-set-->

      <div class="highest-table">
        <table class="table" border='1' cellpadding='0' cellspacing='0'>
          <caption>
            <h2>Highest Saleing Products</h2>
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
               /*foreach ($result5 as $row5*/{
                   //$row5=$result5;
                   // print_r( $result5);exit;
            ?>
            <tr>
              <td><?php echo "name"//$row5['name']; ?></td>
              <td><?php echo "qty"//$row5['totalQty']; ?></td>
              <td><?php echo "sold"//$row5['totalSold']; ?></td>
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
               /*foreach ($result5 as $row6*/{
            ?>
            <tr>
              <td><?php echo 1//$row6['id']; ?></td>
              <td>
                <a href="editsales.php?id=<?php echo $row6['id']; ?>">
                  <?php echo 2//$row6['name']; ?>
                </a>
              </td>
              <td><?php echo 3//$row6['date']; ?></td>
              <td><?php echo 4//$row6['price']; ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!--latest-table-->
    </div>
    <!--Dashboard-->


    <div id="User" border>
      <table class="table" border='1' cellpadding='0' cellspacing='0'>
        <caption>
          <h2>Users</h2>
        </caption>
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>User Role</th>
            <th>Status</th>
            <th>Last Login</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php/*
            if (!empty($result)) {
              foreach ($result as $row)*/ {
              ?>
          <tr>
            <td><?php echo "1"//$row['id']; ?></td>
            <td><?php echo 1// $row['name']; ?></td>
            <td><?php echo 1// $row['username']; ?></td>
            <td><?php echo 1//$row['group_name']; ?></td>
            <td><?php /*if ($row['status']==1) {
                  echo "Active";
                } else */{
                    echo "Deactive";
                  } ?>
            </td>
            <td><?php echo  1//$row['last_login']; ?></td>
            <td>
              <a href="edituser.php?id=<?php echo $row['id']?>">
                <input id="edit" type="submit" name="edit" value="Edit" class="btn btn-success" />
              </a>
              <a href="deleteuser.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure to delete this record?')">
                <input id="delete" type="submit" name="delete" value="Delete" class="btn btn-danger" />
              </a>
            </td>
          </tr>
          <?php}
          }?>
          </tbody-->
      </table>
    </div>
    <!--User-->
    <div id="Categories">
    </div>
    <!--Categories-->
    <div id="Product">
      <table id="dom-jqry" class="table table-striped table-bordered nowrap">
        <thead>
          <tr>
            <th>Id</th>
            <th>Product Image </th>
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
          $sql="SELECT * from categories where id='".$row['categorie_id']." '";
          $result1=$conn->query($sql);
          $row1=$result1->fetch_assoc();


          $sql="SELECT * from media where id='".$row['media_id']." '";
          $result2=$conn->query($sql);
          $row2=$result2->fetch_assoc(); ?>
          <tr class="odd gradeX">
            <td><?php echo $row['id']; ?></td>
            <td><img class="img circle" src="image/<?php echo $row2['file_name']; ?>" style="width: 50px; height: 50px;border-radius:50%;"></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['buy_price']; ?></td>
            <td><?php echo $row['sale_price']; ?></td>
            <td><?php echo $row['date']; ?></td>

            <td>
              <a href="editproduct.php?id=<?php echo $row['id']?>"><input id="edit" type="submit" name="edit" value="Edit" class="btn btn-success" /></a>
              <a href="deleteproduct.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure to delete this record?')"> <input id="delete" type="submit" name="delete" value="Delete" class="btn btn-danger" /></a>
            </td>
          </tr>
          <?php
      }
               ?>

        </tbody>
      </table>
    </div>
    <!--Product-->
    <div id="Sales">
    </div>
    <!--sales-->
  </div>
  <!--body-->
</body>

</html>
