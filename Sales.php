<?php
include("ses_check.php");
include("dbconnection.php");

$sql= "SELECT * from  products where delete_status='0' and quantity>'0' ORDER BY id ASC";
$result=$conn->query($sql);
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
    #sales{
      width: 90%;
      margin: auto 5%;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }
     /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    .hide {
      display: none;
    }

    .parag_r {
      display: flex; /* equal height of the children */
    }

    .parag_c {
      flex: 1; /* additionally, equal width */
      height: 30px;
      padding: 1.2em;
    }

    .vtable{
      position: relative;
    }
    .mydiv{
      display: table;
      width: 100%;
    }
    .form-group{
      display: table-row;
    }
    .col-sm-2{
      padding: 10px;
      display: table-cell;
      text-align: center;
      width: 20%;
      border-bottom : solid 1px black;
    }
    .form-group.head{
      display:table-header-group;
      background-color: #f6f6f6;
    }
    .head .col-sm-2{
      font-size: 21px;
      font-weight: bold;
      padding: 13px;
    }
    .form-group.subdiv{

    }
    .subdiv .col-sm-2{
    text-align: center;
    }

    .col-sm-2 input,.col-sm-2 .select_services {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      text-align: center;
      height: 40px;
      padding: 0;
      width: 85%;
      font-size:19px;
    }

    option{
      text-align: center;
    }
    .btn{
      text-align: center;
      height: 40px;
      font-size:19px;
      width: 80%;
    }

  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Sales | MeroPasal</title>
</head>
<body>
  <div id="load"></div>
  <?php require("menu.php"); ?>
  <div class="body">
    <h1 id="p-title">
      Dashboard
      <?php if($_SESSION['user']==1){ ?>
        Sales
      <?php }else ?>
    </h1>
    <div id="sales">
      <form class="form-valide" method="POST" action="willbill.php" name="userform">
      <div class="">
        <!-- <div class="col-md-6">
          <label class=" control-label">Billed Date:</label>
          <input type="date" name="build_date" class="form-control datepicker" value="<?=date('Y-m-d')?>" data-provide="datepicker">
        </div> -->
        <!--------------------------------------------------------------------------------->
          <div class="parag_r">
            <div id="prag2"class="parag_c">
              <input type="radio" name="alt_btn"  onclick="changeme('2');" required>New Member
              <input type="radio" name="alt_btn" onclick="changeme('1');">Old Member
            </div>
            <div id="prag1" class = "parag_c" ></div><!-- member details -->
          </div>
        <!------------------------------------------------------------------------->
      </div>
      <div class="vtable">
        <div class="mydiv">
        <div class="form-group head">
          <div class="col-sm-2">
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
          <div class="col-sm-2"></div>
        </div>
        <div class="form-group  control-group subdiv">
          <div class="col-sm-2">
            <select name="select_services[]" class="form-control select_services" required>
              <option value="" selected="true" disabled="disabled">--SelectProduct--</option>
              <?php
              foreach ($result as $r_service) { ?>
                <option value="<?php echo $r_service['id'];?>"><?php echo $r_service['name']." (".$r_service['quantity'].")";?></option>
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
            <button class="btn btn-danger remove" type="button">Remove</button>
          </div>
        </div>
        <div class="after-add-more"></div><!--new row will added -->
      </div>
      <!-- mydiv *************action wala div -->
    </div>
    <!-- virtual table container -->
    <style>
    .form-final{
      width: 100%;
      display: flex;
    }
    .blankda{
      flex: 1;
      width: 20%;
      padding: 10px;
      display: table-cell;
      text-align: center;
      font-size:19px;
    }

    .blankda input {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      text-align: center;
      height: 40px;
      padding: 0;
      width: 85%;
      font-size:19px;
    }
    .btn-add{
      width: 75%;
      height: 40px;
      font-size:19px;
    }
    .btn-flat {
      text-align: center;
      padding: 0 6em;
      height: 40px;
      font-size:19px;
    }
    .raph{
      border: transparent;
    }
    </style>
      <div class="form-final">
        <div class="blankda"></div>
        <div class="blankda"></div>
        <input type="text" class="blankda raph" value="Sub total" readonly="">
        <div class="add-txt blankda">
          <input type="text" name="subtotal" id="subtotal" class="form-control" readonly="">
        </div>
        <div class="add-btn blankda">
          <button class="btn-add add-more" type="button"></i> Add</button>
        </div>
      </div>
      <center class="sub-btn">
        <button type="submit" name="btn_save" class="btn-primary btn-flat m-b-30 m-t-30">Submit</button>
      </center>
    </form>
    <!---**********************new row -------------------------------------------------------->
    <div class="copy hide">
      <div class="form-group control-group  subdiv">

        <div class="col-sm-2">
            <select name="select_services[]" class="form-control select_services">
              <option value="" selected="true" disabled="disabled">--SelectProduct--</option>
              <?php
              foreach ($result as $r_service) { ?>
                <option value="<?php echo $r_service['id'];?>"><?php echo $r_service['name']." (".$r_service['quantity'].")";?></option>
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
</div>
</body>
<script src="sales.js"></script>
</html>
