<?php
include("ses_check.php");

include("dbconnection.php")

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/style.css" type="text/css">
  <title></title>
  <style>
    #form {
      float: right;
      display: inline-block;
      width: 25%;
      border: solid 2px;
      border-color: transparent;
      border-radius: 12px;
      margin: 7% 15% auto auto;
      padding: 2em 1em;
      font-size: 18px;
      background-color: #fff;
    }

    #form input {
      width: 90%;
      height: 45px;
      border-radius: 12px;
      font-size: 15px;
      margin: 5% auto;
      border-width: 1px;
      //text-align: center;
      padding-left: 20px;
      outline: 0;
      //vertical-align: middle;
    }


    /* #form input[class=txt]:focus {
      box-shadow: 0 0 0 2px #42b72a;
      //background-color: red;
    } */

  </style>
</head>

<body>
  <form id="form" method="post" action="useradded.php">
    <label>Name</label>
    <input class="form-control" name="name" placeholder="Enter Full Name" required>
    <label>UserName</label>
    <input class="form-control" name="username" placeholder="Enter Username" required>
    <label>Password</label>
    <input class="form-control" name="password" type="password" placeholder="Enter password" pattern=".{8,12}" maxlength="12" title="8 to 12 characters" required/>
    <br>
    <label for="categories">User Level</label>
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
</body>

</html>
