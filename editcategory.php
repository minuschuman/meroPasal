<?php
include("ses_check.php");
include("dbconnection.php");

$sql="SELECT * from categories where delete_status='0' and id='".$_GET['id']." '";
$result=$conn->query($sql)->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post" role="form" action="catedited.php?id=<?php echo $_GET['id'];?>">
            <label>Category</label>
            <input class="form-control col-lg-6" name="name" value="<?php echo $result['name']?>">
            <br>
           <button type="submit" class="btn btn-success" name="btn" >Submit</button>
    </form>
  </body>
</html>
