<?php
include("ses_check.php");

include("dbconnection.php");

$sql= "SELECT * from  categories where delete_status='0'";

$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="loder.js"></script>
  <style>



  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Categories | MeroPasal</title>
</head>
<div id="load"></div>
<body>
  <div class="nav">
    <h1>MeroPasal</h1>
    <ul>
      <a href="superDashboard.php">
        <li id="act">Dashboard</li>
      </a>
      <a href="User.php">
        <li id="menu-user">Users</li>
      </a>
      <a href="#">
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
    <h1 id="p-title">Categories</h1>
    <hr>
    <div id="Categories">
      <div class="adduser">
        <a href="addcat.php"><button class="add-btn">+ Add New</button></a>
        <form method="GET" name="catsrch" id="catsrch">
          <input type="text" name="text" placeholder="Name Only" onkeyup="loadcont(this.value);">
        </form>
      </div>
      <table border='1' cellpadding='0' cellspacing='0' class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="catbody">
          <?php foreach ($result as $row) {  ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
              <a href="editcategory.php?id=<?php echo $row['id']?>">
                <input id="edit" type="submit" name="edit" value="Edit" class="btn btn-success" />
              </a>
              <a href="deletecategory.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure to delete this record?')">
                <input id="delete" type="submit" name="delete" value="Delete" class="btn btn-danger" />
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!--Categories-->
  </div>
  <!--body-->
</body>
</html>
<script>
  function loadcont(){
    var xhttp = new XMLHttpRequest();
    var txt = document.catsrch.text.value;
    xhttp.open("GET","http://localhost/projectbill/catsearcher.php?text=" + txt,true);
    xhttp.onreadystatechange=function(){
      if((this.status==200)&&(this.readyState==4)){
        document.getElementById("catbody").innerHTML=this.responseText;
      }
    }
    xhttp.send();
  }
</script>
