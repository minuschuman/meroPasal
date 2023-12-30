<?php
    $todayDateTime = date('Y-m-d');
?>
<!DOCTYPE html>
  <head>
    <link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
    <title></title>
  </head>
  <body>
    Date:<input type="date" name="indate" value="<?php $todayDateTime ?>"/>
    <table class="table" border='1' cellpadding='0' cellspacing='0'>
      <caption>
        <h2>DAILY SALES REPORT<h2><?php echo "$todayDateTime"; ?>
        </caption>
      <thead>
        <tr>
          <th>SN</th>
          <th>Poduct Name</th>
          <th>Sale</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>3</td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
