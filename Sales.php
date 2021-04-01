<?php
include("ses_check.php");
include("dbconnection.php");
if (isset($_POST['btn_save'])) {
    date_default_timezone_set('Asia/Kathmandu');
    extract($_POST);
    //echo '<script type="text/javascript">alert("' .  $customer_id ." ".$customer_name. '"); </script>';
    $build_date=date('Y-m-d h:i:sa');
    $sql_insert ="INSERT INTO `sales`(`date`, `f_price`, `remark`) VALUES ('$build_date','$subtotal','$remark')";
    $res_insert = $conn->query($sql_insert);
    $last_billing_id =  mysqli_insert_id($conn);
    $billingid = $last_billing_id;
    $service = count($_POST['select_services']);
    for ($i=0;$i<$service;$i++) {
        $sql_service = "INSERT into sales_product(`sales_id`,`prod_id`, `qty`, `unit_price`, `total`)values('$billingid','$select_services[$i]','$quantity[$i]','$unit_price[$i]','$total[$i]')";
        //echo '<script type="text/javascript">alert("' .$select_services[$i].'");</script>';
        $conn->query($sql_service);
    }
/************************************************************************************************/
    if ($customer_name!=="") {//new member
      $sql_ctmr="INSERT INTO `customer` (`cname`,`reg_date`,`t_buy`) VALUES ('$customer_name','$build_date',$subtotal)";
      $result_ctmr=$conn->query($sql_ctmr);
      $sql_main="SELECT * from `customer` where `cname`='$customer_name' AND  `reg_date`='$build_date'";
      $result_main=$conn->query($sql_main);
      echo '<script type="text/javascript">alert("' ."$build_date".'");</script>';
      if ($result_main->num_rows > 0) {
        while($row = $result_main->fetch_assoc()) {
          echo '<script type="text/javascript">alert("'.$row['csid'].'");</script>';
        }
      }
    }
    else {//old member
      $sql_main="SELECT * from `customer` where `csid`=$customer_id";
      $result_main=$conn->query($sql_main);
      if ($result_main->num_rows > 0) {
        while($row = $result_main->fetch_assoc()) {
          $subtotal=$row['t_buy']+$subtotal;
          //echo '<script type="text/javascript">alert("'.$row['cname'] ." ".$subtotal.'");</script>';
          $sql_ctmr="UPDATE `customer` SET `t_buy`=$subtotal WHERE `csid` = $customer_id ";
          $result_ctmr=$conn->query($sql_ctmr);
        }
      }
    }
/********************************************************************************************************/
?>
<script type="text/javascript">
  //window.location = "sales.php";
</script>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="loder.js"></script>
  <style>
    .hide {
      display: none;
    }
    .body{
      background-color: red;
    }

  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Sales | MeroPasal</title>
</head>
<body>
  <div id="load"></div>
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
      <a href="ses_clear.php" onclick="return confirm('Are you sure you want to logout?')"><li id="out-btn">Log Out</li></a>
    </ul>
  </div>
  <div class="body">
    <form class="form-valide" method="POST" name="userform" enctype="multipart/form-data">
      <div class="row">
        <div class="form-group row col-md-6">
          <label class="col-sm-3 control-label">Billed Date:</label>
          <input type="date" name="build_date" class="form-control datepicker" value="<?=date('Y-m-d')?>" data-provide="datepicker">
        </div>
        <!--*******************************************************************-->
        <div id="prag2">
          <input type="radio" name="alt_btn" value="" onclick="changeme('2');" required>New Member
          <input type="radio" name="alt_btn" value="" onclick="changeme('1');">Old Member
        </div>
        <div id="prag1" ></div>
        <!------------------------------------------------------------------------->
      </div>
      <div class="form-group row">
        <div class="col-sm-3">
            Product
        </div>
        <div class="col-sm-2">
          Quantity
        </div>
        <div class="col-sm-2">
          Sale Price
        </div>
        <div class="col-sm-2">
          Total
        </div>
      </div>
      <div class="mydiv">
        <div class="form-group row control-group after-add-more subdiv">
          <div class="col-sm-3">
            <select name="select_services[]" class="form-control select_services" required>
              <option value="" selected="true" disabled="disabled">--SelectProduct--</option>
              <?php
                $sql= "SELECT * from  products where delete_status='0' ORDER BY id DESC";
                $result=$conn->query($sql);
                foreach ($result as $r_service) { ?>
                <option value="<?php echo $r_service['id'];?>"><?php echo $r_service['name'];?></option>
              <?php } ?>
            </select>
          </div>
          <div class="col-sm-2">
            <input type="text" class="form-control" class="quantity" name="quantity[]" placeholder="Qty" required>
          </div>
          <div class="col-sm-2">
            <input type="text" class="form-control" class="unit_price" name="unit_price[]" placeholder="Sale Price" required>
          </div>

          <div class="col-sm-2">
            <input type="text" class="form-control total" class="total" name="total[]" placeholder="Total" readonly="">
          </div>

          <div class="col-sm-2">
            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add</button>
          </div>
        </div>

      </div>
      <!-- mydiv -->

      <div class="form-group row">
        <label class="col-sm-6 control-label">Total</label>
        <div class="col-sm-3">
          <input type="text" name="subtotal" id="subtotal" class="form-control" placeholder="Subtotal" readonly="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-6 control-label">Remark</label>
        <div class="col-sm-3">
          <input type="text" name="remark" id="remark" class="form-control" placeholder="Remark">
        </div>
      </div>
      <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
    </form>
    <div class="copy hide">
      <div class="form-group control-group row subdiv">

        <div class="col-sm-3">
            <select name="select_services[]" class="form-control select_services">
              <option value="">--SelectProduct--</option>
              <?php
                          $sql= "SELECT * from  products where delete_status='0' ORDER BY id DESC";
                            $result=$conn->query($sql);
                         foreach ($result as $r_service) { ?>
              <option value="<?php echo $r_service['id'];?>"><?php echo $r_service['name'];?></option>
              <?php } ?>
            </select>
        </div>

        <div class="col-sm-2">
          <input type="text" class="form-control" class="quantity" name="quantity[]" placeholder="Qty">
        </div>

        <div class="col-sm-2">
          <input type="text" class="form-control" class="unit_price" name="unit_price[]" placeholder="Sale Price">
        </div>

        <div class="col-sm-2">
          <input type="text" class="form-control total" class="total" name="total[]" placeholder="Total" readonly="">
        </div>
        <div class="col-sm-2">
          <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
      </div>
    </div>
</div>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
<!-- <script src="http://code.jquery.com/jquery-latest.js"></script> -->
<script src="jquery-3.5.1.js"></script>
<script src="sales.js"></script>
