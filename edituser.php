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
  <style>


  </style>
  <!--link rel="shortcut icon" href=".ico"-->
  <title>Users | MeroPasal</title>
</head>
<body>
  <div class="nav">
    <h1 id="myName">Mero Pasal</h1>
  </div>
  <div class="body">
    <h1 id="p-title">Users</h1>
    <hr>
      <form method="POST" action="useredited.php?id=<?php echo $_GET['id'];?>">
        <div id="page-wrapper">
          <div class="container-fluid">
            <h2> Edit User</h2>
            <div class="form-group">
              <label>Name</label><br>
              <input class="form-control" name="name" value="<?php echo $result['name']?>" required>
            </div>
            <div class="col-lg-6">
              <label>User Name</label><br>
              <input class="form-control" name="username" value="<?php echo $result['username']?>" required>
            </div>
            <div class="form-group">
              <!--label for="user_level">Select User Role</label><br>
              <select name="user_level" required class="form-control">
                <?php /* while ($row1){ ?>
                <option value="<?php echo $row1['id']; ?>" <?php if($result['user_level']==$row1['id']){echo "selected";}?>><?php echo $row1['group_name']; ?></option>";
                <?php } */?>
              </select-->
            </div><!--form_group-->
          </div>
          <label>Status</label>
          <div class="radio">
            <label>
              <input type="radio" name="status" value="1" <?php if($result['status']=='1'){echo "checked";}?>>Active
            </label>
            <label>
              <input type="radio" name="status" value="0" <?php if($result['status']=='0'){echo "checked";}?>>Deactive
            </label>
          </div>
        </div>
        <button type="submit" class="btn btn-success" name="btn"> Submit</button>
      </form>
    </div>
    <!--UserEdit-->
  </div>
  <!--body-->
</body>

</html>
