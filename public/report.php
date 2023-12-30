<?php
include("ses_check.php");
include 'dbconnection.php';
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
  <title>Admin | MeroPasal</title>
</head>
<div id="load"></div>
<body>
<?php include 'menu.php';?>
<div class="body">
  <h1 id="p-title">Report</h1>

<?php
$today = date('Y-m-d');
$yday = date('Y-m-d', strtotime("-1 days"));
// echo "$yday";
/*****Search Daily sales*****/
if (isset($_POST['searchSumData'])) {
    $sdate = $_POST['sdate'];
    $result = $conn->query("SELECT sum(f_price) as sResult from sales where DATE_FORMAT(date, '%Y-%m-%d') ='$sdate'");
    $row = $result->fetch_assoc();
    if ($row['sResult']!=null) {
        // $sdate = date("l tS M Y", strtotime($sdate));
        $msg = "Sales On $sdate is <i><u>".$row['sResult']."</u></i>";
    } else {
        $msg = "Data Not Found";
    }
}
?>


<div id="fixer">
  <fieldset class="form-border">
    <legend>Day</legend>
    <form action="report.php" method="post">
      Enter Date:
      <input type="date" name="sdate" class="dateValid" required max="<?=$today?>">
      <input type="submit" name="searchSumData" value="Search"><br>
    </form>
  </fieldset>
  <!-- <div id="fixer">
    <fieldset class="form-border">
      <legend>Day</legend>
      <form action="report.php" method="post">
        Enter Date:<br>
        <input type="date" name="sdate" class="dateValid" required max="<?=$today?>">
        <input type="submit" name="searchSumData" value="Search"><br>
        <?php
        global $msg;
        echo "$msg";
        ?>
      </form>
    </fieldset> -->
  <fieldset class="form-border">
    <legend>Period</legend>
    <form class="" action="report.php" method="post">
      <input type="date" name="fDate" class="dateValid" required max="<?=$yday?>">
      <input type="date" name="lDate" class="dateValid" required max="<?=$today?>">
      <input type="submit" name="searchTabData" value="Search"><br>
    </form>
  </fieldset>
  <h2>
  <?php
  global $msg;
  echo "$msg";
  ?>
</h2>
</div>
    <style media="screen">
    h2{
      text-align: center
    }
      #fixer {
        width: 100%;
      }

      .form-border {
        border: solid 2px;
        width: 40%;
        margin-left: 4.5%;
        margin-bottom: 5vh;
        margin-top: 5vh;
        padding: 20px;
        display: inline-block;
      }
    </style>
    <?php
    /***********************search sales between some date****************/
    if (isset($_POST['searchTabData'])) {
        extract($_POST);
        if ($conn->query("CREATE OR REPLACE VIEW GrandData AS SELECT DATE_FORMAT(date, '%Y-%m-%d') as ndate, f_price as price from sales where date between '$fDate' and '$lDate' AND delete_status = 0")) {
            $data=$conn->query("SELECT sum(price) as sprice , ndate FROM granddata GROUP BY ndate");
            if(mysqli_num_rows($data)==0){
            echo "<h2>Data not found between '$fDate' to '$lDate'</h2>";
            }
            else{
            echo "<h2>Sales From $fDate to $lDate</h2>";
    ?>
      <table class="table" cellpadding='0' cellspacing='0'>
        <thead>
        <tr>
          <th>S.N.</th>
          <th>Date</th>
          <th>Sales</th>
        </tr>
        <thead>
      <?php $i=1; foreach ($data as $value) { ?>
        <tr>
          <td><?=$i?></td>
          <td><?=$value['ndate']?></td>
          <td><?=$value['sprice']?></td>
        </tr>
      <?php $i++; }
    }
    $conn->query("DROP VIEW GrandData") ;
  } else {
      $msg ="try again";
    }
    }
    ?>
    <script>
      function validDate() {
        // var today = new Date().toISOString().split('T')[0];
        // console.log(today);
        // var nextWeekDate = new Date(new Date().getTime() + 6 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]
        // document.getElementsByName("sdate")[0].setAttribute('min', today);
        // document.getElementsByClassName("dateValid")[0,1].setAttribute('max', today)
      }
    </script>
