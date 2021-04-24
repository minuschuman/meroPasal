<?php
include("ses_check.php");
include("dbconnection.php");

$sql="SELECT * from users where delete_status='0' and id='".$_GET['id']." '";
$result=$conn->query($sql)->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <link rel="stylesheet" href="style/user.css" type="text/css"/>
  <script src="loder.js"></script>
  <title>Users | MeroPasal</title>
  <style media="screen">
    .form-lb{
      display: block;
      margin-left: 5% ;
      margin-top: 2vh;
      font-size: 18px;
    }
    .form-control{
      margin-top: 0;
    }
  </style>
</head>
<div id="load"></div>
<body>
  <?php require("menu.php"); ?>
  <h1 id="p-title">Edit User</h1>
  <div class="body">
    <br>
    <div class="form-container">
      <form method="POST" action="useredited.php?id=<?php echo $_GET['id'];?>">
              <label class="form-lb">Name</label>
              <input class="form-control" name="name" value="<?php echo $result['name']?>" required>
              <label class="form-lb">User Name</label>
              <input class="form-control" name="username" value="<?php echo $result['username']?>" required>

            <div class="form-group">
              <!--label for="user_level">Select User Role</label><br>
              <select name="user_level" required class="form-control">
                <?php /* while ($row1){ ?>
                <option value="<?php echo $row1['id']; ?>" <?php if($result['user_level']==$row1['id']){echo "selected";}?>><?php echo $row1['group_name']; ?></option>";
                <?php } */?>
              </select-->
            </div><!--form_group-->
          <div class="radio">
            <strong>Status</strong>
              <input type="radio" name="status" value="1" <?php if($result['status']=='1'){echo "checked";}?>>Active
              <input type="radio" name="status" value="0" <?php if($result['status']=='0'){echo "checked";}?>>Deactive
          </div>
        <center>
          <button type="submit" class="btn btn-success" name="btn">Submit</button>
        </center>
      </form>
    </div>
    <!--UserEdit-->
  </div>
  <!--body-->
</body>

</html>
