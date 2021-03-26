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
$sql_sales="SELECT count(id) as sales_id from sales where delete_status='0' ";
$result_sales=$conn->query($sql_sales);
$row_sales=$result_sales->fetch_assoc();

/*****************highest sales****************/
$sql_N="SELECT p.name, COUNT(s.prod_id) AS totalSold, SUM(s.qty) AS totalQty FROM sales s LEFT JOIN products p ON p.id = s.prod_id where s.delete_status=0 GROUP BY s.prod_id";
$result_N=$conn->query($sql_N);
/**************************/
$sql_LS="SELECT s.id,s.qty,s.price,s.date,p.name FROM sales s right JOIN products p ON p.id = s.prod_id where s.delete_status=0 GROUP BY s.id DESC LIMIT 5 ";
$result_LS=$conn->query($sql_LS);

/************IF require recently added******************
$sql_LS="SELECT p.id,p.name,p.sale_price,c.name AS categorie FROM products p LEFT JOIN categories c ON c.id = p.cat_id where p.delete_status=0 ORDER BY c.id DESC LIMIT 3";
$result_LS=$conn->query($sql_LS);
****************/
?>
