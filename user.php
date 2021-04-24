<?php
include("ses_check.php");

include("dbconnection.php");

/***********************************/
$sql= "SELECT id, name, username, user_level, status, last_login FROM users where delete_status='0' ORDER BY id ASC";
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

    #usrsrch{
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
    #usrsrch input{
      height: 45px;
      text-align: center;
    }
    a:link{
      text-decoration:none;
    }
  </style>
  <title>Users | MeroPasal</title>
</head>
<div id="load"></div>
<body>
  <?php require("menu.php"); ?>
  <h1 id="p-title">Users</h1>
  <div class="body">
    <div class="adduser">
      <form method="GET" name="usrsrch" id="usrsrch">
        <a href="adduser.php" class="newbock"><button type="button" class="add-btn size-mg">+ Add New</button></a>
        <input type="text" class="size-mg srchtxt" name="text" placeholder="Name Only" onkeyup="loadcont(this.value);">
      </form>
    </div>
    <div id="User">
      <table class="table" cellpadding='0' cellspacing='0'>
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Username</th>
            <th>Status</th>
            <th>Last Login</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="userbody"></tbody>
        <tbody>
          <?php
            if (!empty($result)) {
              foreach ($result as $row) {
              ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php if ($row['status']==1) {
                  echo "Active";
                } else {
                    echo "Deactive";
                  } ?>
            </td>
            <td><?php echo  $row['last_login']; ?></td>
            <td>
              <a href="edituser.php?id=<?php echo $row['id']?>">
                <input id="edit" type="submit" name="edit" value="Edit" class="btn btn-success" />
              </a>

              <a href="deleteuser.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure to delete this record?')">
                <input id="delete" type="submit" name="delete" value="Delete" class="btn btn-danger" />
              </a>
            </td>
          </tr>
          <?php }
          }?>
          </tbody>
      </table>
    </div>
    <!--User-->

  </div>
  <!--body-->
</body>
</html>
<script>
  function loadcont(){
    var xhttp = new XMLHttpRequest();
    var txt = document.usrsrch.text.value;
    xhttp.open("GET","usersearcher.php?text=" + txt,true);
    xhttp.onreadystatechange=function(){
      if((this.status==200)&&(this.readyState==4)){
        document.getElementById("userbody").innerHTML=this.responseText;
      }
    }
    xhttp.send();
  }
</script>
