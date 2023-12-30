<?php
include("dbconnection.php");
if(isset($_POST['btn']))
{
    $sql="insert into categories(name)values('".$_POST['name']."')";
  if($conn->query($sql)==TRUE)
  {
    echo"Record Inserted Sucessfully ";?>
<script>
  window.location = 'categories.php';
</script>
<?php }else
  {
    echo "Something Wrong" . $conn->error;
  }

}
?>
<form role="form" method="post">
    <label>Category</label>
    <input class="form-control col-lg-6" name="name" placeholder="Enter Category Name">
    <br>
    <button type="submit" class="btn btn-success" name="btn">Submit </button>
</form>
