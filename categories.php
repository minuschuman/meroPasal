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
  .newbock{
    display: inline-block;
  }
  #catsrch{
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
  #catsrch input{
    height: 45px;
    text-align: center;
  }
  a:link{
    text-decoration:none;
  }
  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Categories | MeroPasal</title>
</head>
<div id="load"></div>
<body>
  <?php require("menu.php"); ?>
  <h1 id="p-title">Categories</h1>
  <div class="body">
    <div id="Categories">
      <div class="adduser addnew">
        <form method="GET" name="catsrch" id="catsrch">
          <a href="addcat.php" class="newbock "><button type="button" class="add-btn size-mg">+ Add New</button></a>
          <input type="text" class="size-mg srchtxt" name="text" placeholder="Name Only" onkeyup="loadcont(this.value);">
        </form>
      </div>
      <table cellpadding='0' cellspacing='0' class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Category Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="catbody"></tbody>
        <tbody>
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
    xhttp.open("GET","catsearcher.php?text=" + txt,true);
    xhttp.onreadystatechange=function(){
      if((this.status==200)&&(this.readyState==4)){
        document.getElementById("catbody").innerHTML=this.responseText;
      }
    }
    xhttp.send();
  }
</script>
