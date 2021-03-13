<!DOCTYPE html>
<html>
<head>
  <style>
    #login{
      //display center;
    }
  </style>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/style.css" type="text/css">
  <favicon></favicon>
  <title>MeroPasal : Log In</title>
</head>
<body>
  <center>
  <form action="validation.php" boarder="1" class="login" method="POST" id="login">
  		<label>Username</label>
  		<input type="text" name="name" id="txt"/><br>
  		<label>Password</label>
  		<input type="password" name="pass" ><br>
  		<input type="submit" value="Log In" id="sbm"/>
   </form>
   </center>
</body>
</html>
