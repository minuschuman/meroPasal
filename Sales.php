<?php
include("ses_check.php");
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="loder.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
  <!-- <script src="http://code.jquery.com/jquery-latest.js"></script> -->
  <script src="jquery-3.5.1.js"></script>

  <style>
    .hide {
      display: none;
    }
    .body{

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
    <form class="form-valide" method="POST" action="willbill.php" name="userform">
      <div class="">
        <div class="form-group  col-md-6">
          <label class=" control-label">Billed Date:</label>
          <input type="date" name="build_date" class="form-control datepicker" value="<?=date('Y-m-d')?>" data-provide="datepicker">
        </div>
        <!--------------------------------------------------------------------------------->
        <div id="prag2">
          <input type="radio" name="alt_btn" value="" onclick="changeme('2');" required>New Member
          <input type="radio" name="alt_btn" value="" onclick="changeme('1');">Old Member
        </div>
        <div id="prag1" ></div>
        <!------------------------------------------------------------------------->
      </div>
      <div class="form-group ">
        <div class="">
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
        <div class="form-group  control-group after-add-more subdiv">
          <div class="">
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
            <button class="btn  add-more" type="button"></i> Add</button>
          </div>
        </div>

      </div>
      <!-- mydiv -->

      <div class="form-group ">
        <label class=" control-label">Total</label>
        <div class="">
          <input type="text" name="subtotal" id="subtotal" class="form-control" placeholder="Subtotal" readonly="">
        </div>
      </div>
      <div class="form-group ">
        <label class=" control-label">Remark</label>
        <div class="">
          <input type="text" name="remark" id="remark" class="form-control" placeholder="Remark">
        </div>
      </div>
      <button type="submit" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Submit</button>
    </form>
    <div class="copy hide">
      <div class="form-group control-group  subdiv">

        <div class="">
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
          <button class="btn btn-danger remove" type="button">Remove</button>
        </div>
      </div>
    </div>
</div>
</body>
<script src="sales.js"></script>
</html>
