<?php
include("ses_check.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>User | MeroPasal</title>
  <script src="loder.js"></script>
  <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <link rel="stylesheet" href="style/user.css" type="text/css" />
</head>
<div id="load"></div>
<body>
  <?php require("menu.php"); ?>
  <h1 id="p-title">Add Users</h1>
  <div class="body">
    <br>
    <div class="form-container">
      <form id="form" method="post" action="useradded.php">
        <input class="form-control" name="name" placeholder="Enter Full Name" required>
        <input class="form-control" name="username" placeholder="Enter Username" required>
        <select name="user_level" class="form-control" id="user_level" required>
          <option selected="true" disabled="disabled" value="">User Level</option>
          <option value="1">admin</option>"
          <option value="0">user</option>"
        </select>
        <div class="radio">
          <strong>Status</strong>
          <input type="radio" name="status" value="1"  required>Active
          <input type="radio" name="status" value="0">Deactive
        </div>
        <input class="form-control" name="password" type="password" placeholder="Enter password" pattern=".{8,12}" maxlength="12" title="8 to 12 characters" required/>
        <center>
          <input type="submit" value="Submit" class="btn btn-success" name="btn">
        </center>
      </form>
    </div>
  </div>
</body>
</html>
