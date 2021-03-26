<?php
require("dbconnection.php");
if($_REQUEST['text']!=null){
  $var1 = $_REQUEST['text']."%";
  $sql="SELECT * FROM users WHERE name Like '$var1'";
  $result=mysqli_query($conn,$sql);
  $arr_users = [];
  if ($result->num_rows > 0) {
      $arr_users = $result->fetch_all(MYSQLI_ASSOC);
  }
  if(!empty($arr_users)) {
    foreach($arr_users as $row) {?>
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
      </tr><?php
    }
  }else{
    echo"<h3>can't find</h3>";
  }
}
else{
  //echo"<h3>Enter some value</h3>";
  //header("location:superDashboard.php");
  ?><script>
  function uploadCanceled(evt) {
    console.log("Cancelled: " + this.status);
  }
  </script>
<?php }
