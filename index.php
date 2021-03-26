<?php
session_start();
if((isset($_SESSION['username']))&&($_SESSION['active']==0)){
	header("location:superDashboard.php");
}
?><html>
<head>
  <style>
    body{
      background-color: #dfe3ee;
    }
    #caphead{
      width: 30%;
      display: inline-block;
      float: left;
      margin-top: 10%;
      margin-left: 15%
    }
    #caphead h1{
      padding-top: 0;
      color: #42b72a;
    }
    #login{
      float: right;
      display: inline-block;
      width: 25%;
      border: solid 2px;
      border-color: transparent;
      border-radius:12px;
      margin: 7% 15% auto auto;
      padding: 2em  1em;
      font-size: 18px;
      background-color: #fff;
    }
    #login input{
      width: 90%;
      height: 45px;
      border-radius:12px;
      font-size: 15px;
      margin: 5% auto;
      border-width: 1px;
      //text-align: center;
      padding-left: 20px;
      outline: 0;
      vertical-align: middle;
    }

    .txt{
      //font-style: italic;
      //font-weight: bold;
      color: black;
    }

    input[class=txt]:focus{
      box-shadow: 0 0 0 2px #42b72a;
      //background-color: red;
    }

  </style>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style/style.css" type="text/css">
  <favicon></favicon>
  <title>MeroPasal : Log In</title>
</head>
<body>
  <div id="caphead">
    <h1>MeroPasal</h1>
    <p>Store Solution</p>
  </div>
  <form action="validation.php" boarder="1" class="login" method="POST" id="login">
  		<!--label>Username</label-->
  		<input type="text" name="name" class="txt" placeholder="Username"/><br>
  		<!--label>Password</label-->
  		<input type="password" name="pass" class="txt" placeholder="Password"><br>
      <hr style="height:2px;border-width:0;color:gray;background-color:gray;margin:2em auto;">
  		<input type="submit" value="Log In" id="sbm"/>
   </form>
</body>
</html>
