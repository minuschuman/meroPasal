<?php
include("ses_check.php");

include("dbconnection.php")

?>
<form role="form" method="post" action="useradded.php">
  <label>Name</label>
  <input class="form-control" name="name" placeholder="Enter Full Name" required>
  <label>User Name</label>
  <input class="form-control" name="username" placeholder="Enter Username" required>
  <label>Password</label>
  <input class="form-control" name="password" type="password" placeholder="Enter password" pattern=".{8,12}" maxlength="12" title="8 to 12 characters" required>
  <label for=" categories">User Level</label>
  <select name="user_level" required class="form-control" id="user_level">
      <option value="1">admin</option>"
      <option value="0">user</option>"
  </select>
  <br/>
  <label>Status</label>
  <div class="radio">
    <label>
      <input type="radio" name="status" value="1" checked>Active
    </label>
    <label>
      <input type="radio" name="status" value="0">Deactive
    </label>
  </div>
    <input type="submit" class="btn btn-success" name="btn">
</form>
