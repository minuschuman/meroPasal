<?php
$name = $_SESSION['name'];
$user = $_SESSION['user'];
?>
<div class="nav">
  <h1 id="myName"><u>MeroPasal</u></h1>
  <!--dl>
    <dt>fire</dt>
    <dd>ylo</dd>
    <dd>red</dd>
  </dl-->
  <ul>
    <?php if($user == 1) { ?>
      <a href="superDashboard.php" class="activeMenuItem <?php //echo (($page == 'one') ? 'active' : '') ?>">
        <li id="act">Dashboard</li>
      </a>
      <a href="User.php" class="activeMenuItem">
        <li id="menu-user">Users</li>
      </a>
    <?php } ?>
    <a href="categories.php" class="activeMenuItem">
      <li id="menu">Categories</li>
    </a>
    <a href="Product.php" class="activeMenuItem">
      <li id="act">Products</li>
    </a>
    <a href="Sales.php" class="activeMenuItem">
      <li id="act">Sales</li>
    </a>
    <a href="ses_clear.php" onclick="return confirm('Are you sure you want to logout?')"><li id="out-btn">Log Out</li></a>
  </ul>
</div>

<?php  ?>
