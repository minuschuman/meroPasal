<?php
include("ses_check.php");

include("dbconnection.php");
$sql = ("SELECT * FROM  categories  where delete_status=0 ");
$result = mysqli_query($conn, $sql);

?>
<form role="form" action="prodadded.php" method="post">
  <label>Product Name</label>
  <input class="form-control" name="name" placeholder="Enter Product Name" required>
  <label for=" Products">Select Category</label>
  <select name="categorie_id" required class="form-control" id="categorie_id">
    <option value=''>Select</option>
    <?php
     while ($row = mysqli_fetch_assoc($result)){ ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>";
    <?php } ?>
    ?>
  </select>
  <label>Quantity</label>
  <input class="form-control" name="quantity" placeholder="Enter Quantity" required>
  <label>Buying Price</label>
  <input class="form-control" name="buy_price">
  <label>Sale Price</label>
  <input class="form-control" name="sale_price">
  <button type="submit" class="btn btn-success" name="btn">Submit</button>
</form>
