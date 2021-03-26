<?php
include("ses_check.php");

include("dbconnection.php");

/***********************************/
$sql= "SELECT id, name, username, user_level, status, last_login FROM users where delete_status='0' ORDER BY name ASC";
$result=$conn->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="loder.js"></script>
  <style>
    .adduser button{
      border: transparent;
      height: 45px;
      border-radius:12px;
      float: left;
      margin-left: 5%;
    }
    #usrsrch{
      display: inline-block;
      float: right;;
      margin-right: 5%
    }
    #usrsrch input{
      //border: 1px;
      height: 45px;
      border-radius:12px;
      //background-color: deeppink;
    }
    .adduser{
      //margin-bottom: 1em;
      //background-color: red;
    }
  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Users | MeroPasal</title>
</head>
<div id="load"></div>
<body>
  <div class="nav">
    <h1 id="myName">MeroPasal</h1>
    <ul>
      <a href="superDashboard.php">
        <li id="act">Dashboard</li>
      </a>
      <a href="#">
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
      <a href="ses_clear.php"><li id="out-btn">Log Out</li></a>
    </ul>
  </div>
  <div class="body">
    <h1 id="p-title">Users</h1>
    <hr>
    <div class="newdi" style="background-color:red;">
    <div class="adduser">
      <a href="adduser.php"><button class="add-btn">+ Add New</button></a>
    </div>
    <div class="">
      <form method="GET" name="usrsrch" id="usrsrch">
        <input type="text" name="text" placeholder="">
        <input type="button" onclick="loadcont();" value="search">
      </form>
    </div>
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
          </tbody-->
      </table>
    </div>
    <!--User-->

  </div>
  <!--body-->
</body>

</html>
