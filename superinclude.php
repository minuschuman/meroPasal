<?php
include("ses_check.php");

include("dbconnection.php");
/*******accessing user table*****/
$sql="SELECT COUNT(id) as user_id FROM users WHERE delete_status='0' AND status='1'";
$result_user=$conn->query($sql);
$row_user=$result_user->fetch_assoc();

/**************categories*******************/
$sql_cat="SELECT  COUNT(id) as cat_id FROM categories WHERE delete_status='0'";
$result_cat=$conn->query($sql_cat);
$row_cat=$result_cat->fetch_assoc();

/**************product**************/
$sql_prod="SELECT  COUNT(id) as prod_id FROM products WHERE delete_status='0'";
$result_pord=$conn->query($sql_prod);
$row_prod=$result_pord->fetch_assoc();

/*************sales***********************/
$date = date("Y-m-d");
$sql_sales="SELECT sum(f_price) as day_sale from sales where delete_status='0' and DATE_FORMAT(date, '%Y-%m-%d') = '$date'";
$result_sales=$conn->query($sql_sales);
$row_sales=$result_sales->fetch_assoc();

/*****************highest sales****************/
$sql_N="SELECT p.name, COUNT(s.prod_id) AS totalSold, SUM(s.qty) AS totalQty FROM sales s LEFT JOIN products p ON p.id = s.prod_id where s.delete_status=0 GROUP BY s.prod_id";
$result_N=$conn->query($sql_N);

/**************************/
$sql_LS="SELECT s.id as id, s.date as date,c.cname as name,s.f_price as price  from sales s, ctmr_sales cs, customer c where s.id=cs.sales_id and cs.cid=c.csid and s.delete_status=0 ORDER BY s.date DESC LIMIT 5";
// STR_TO_DATE(login_time, '%l:%i %p')
$result_LS=$conn->query($sql_LS);

/********************************************/
$date = date("Y");
$sql_msale ="SELECT SUM(f_price) as price,DATE_FORMAT(date, '%M') as date  from sales WHERE delete_status='0' and DATE_FORMAT(date, '%Y') = $date  group by DATE_FORMAT(date, '%Y-%m')";
$result_msale=$conn->query($sql_msale);



/*SELECT s.id,ps.qty as s.qty,ps.t_price as s.price,s.date,p.name  from sales s, prod_sales ps, products p where s.id=ps.sales_id and ps.prod_id=p.id
/************IF require recently added******************
$sql_LS="SELECT p.id,p.name,p.sale_price,c.name AS categorie FROM products p LEFT JOIN categories c ON c.id = p.cat_id where p.delete_status=0 ORDER BY c.id DESC LIMIT 3";
$result_LS=$conn->query($sql_LS);
****************/

$dataPoints = array();
$date = date("Y-m-d");
$date = date("Y-m-d",strtotime("-30 day", strtotime("$date")));
for($i = 0; $i<30; $i++){
  $date = date("Y-m-d",strtotime("+1 day", strtotime("$date")));
  $result_graph =$conn->query("SELECT sum(f_price) as day_sale from sales where delete_status='0' and DATE_FORMAT(date, '%Y-%m-%d') = '$date'");
  $row_graph=$result_graph->fetch_assoc();
  // $r_date = DATE_FORMAT(strtotime("$date"), '%m-%d');
  $one_item = array(
    "y" => $row_graph['day_sale'],
    "label" => "$date"
  );
      array_push($dataPoints, $one_item);
}


?>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "sales over Last 30 Days"
	},
	axisY: {
		title: "Amount"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

}
</script>
