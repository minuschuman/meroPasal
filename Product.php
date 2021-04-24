<?php
include("ses_check.php");

include("dbconnection.php");

$sql= "SELECT * FROM categories c inner join products p on c.id=p.cat_id where p.delete_status=0 and c.delete_status=0 ORDER BY p.id ASC";

$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="loder.js"></script>
  <style>
  .newbock{
    display: inline-block;
  }
  #prodsrch{
    width: 80%;
    margin: auto 10%;
    height: 50px;
    padding: 5px;
  }
  .size-mg{
    height: 40px;
  }

  .srchtxt{
    margin-left: 75%;
  }
  #prodsrch input{
    height: 45px;
    text-align: center;
  }
  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Product | MeroPasal</title>
</head>
<div id="load"></div>
<body>
  <?php require("menu.php"); ?>
  <h1 id="p-title">Product</h1>
  <div class="body">
    <div id="Product">
      <div class="addprod">
        <form method="GET" name="prodsrch" id="prodsrch">
          <a href="addprod.php" class="newbock"><button type="button" class="add-btn size-mg">+ Add New</button></a>
          <input type="text" class="size-mg srchtxt" name="text" placeholder="Name Only" onkeyup="loadcont(this.value);">
        </form>
      </div>
      <table class="table" border='1' cellpadding='0' cellspacing='0'>
        <thead>
          <tr>
            <th>SN</th>
            <th>Product Name</th>
            <th>Instock</th>
            <th>Buying Prize</th>
            <th>Saleing Price</th>
            <th>Product Added</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="prodbody"></tbody>
        <tbody>
          <?php
          $i=0;
          foreach ($result as $row) {
            $i++;
          ?>
          <tr class="odd gradeX">
            <td><?php echo $i; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['buy_price']; ?></td>
            <td><?php echo $row['sale_price']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td>
              <a href="editprod.php?id=<?php echo $row['id']?>"><input id="edit" type="submit" name="edit" value="Edit" /></a>
              <a href="delprod.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure to delete this record?')">
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
<script>
  function loadcont(){
    var xhttp = new XMLHttpRequest();
    var txt = document.prodsrch.text.value;
    xhttp.open("GET","prodsearcher.php?text=" + txt,true);
    xhttp.onreadystatechange=function(){
      if((this.status==200)&&(this.readyState==4)){
        document.getElementById("prodbody").innerHTML=this.responseText;
      }
    }
    xhttp.send();
  }
</script>
