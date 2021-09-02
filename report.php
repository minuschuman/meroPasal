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

if (isset($_POST['searchSumData'])) {
    $sdate = $_POST['sdate'];
    $result = $conn->query("SELECT sum(f_price) as sResult from sales where DATE_FORMAT(date, '%Y-%m-%d') ='$sdate'");
    $row = $result->fetch_assoc();
    if ($row['sResult']!=null) {
        // $sdate = date("l tS M Y", strtotime($sdate));
        $msg = "Sales On <font size=3> $sdate</font> is <font size=4>".$row['sResult']."</font>";
    } else {
        $msg = "<font size=4 color = >No data Found</font>";
    }
}
if (isset($_POST['searchTabData'])) {
    extract($_POST);
    $conn->query("SELECT * from sales where date between '$fDate' and '$lDate'");
}
?>
<div id="fixer">
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
  </fieldset>
  <div id="fixer">
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
    </fieldset>
  <fieldset class="form-border">
    <legend>Period</legend>
    <form class="" action="report.php" method="post">
      <input type="date" name="fDate" class="dateValid" required max="<?=$yday?>">
      <input type="date" name="lDate" class="dateValid" required max="<?=$today?>">
      <input type="submit" name="searchTabData" value="Search"><br>
      <?php
      global $msg1;
      echo "$msg1";
      ?>
    </form>
  </fieldset>
  <div>
    <style media="screen">
      #fixer {
        width: 100%;
      }

      .form-border {
        border: solid 2px;
        width: 30%;
        margin: auto;
        margin-bottom: 5vh;
        padding: 20px;
      }
    </style>
    <script>
      function validDate() {
        // var today = new Date().toISOString().split('T')[0];
        // console.log(today);
        // var nextWeekDate = new Date(new Date().getTime() + 6 * 24 * 60 * 60 * 1000).toISOString().split('T')[0]
        // document.getElementsByName("sdate")[0].setAttribute('min', today);
        // document.getElementsByClassName("dateValid")[0,1].setAttribute('max', today)
      }
    </script>
