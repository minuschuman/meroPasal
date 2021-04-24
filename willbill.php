<?php
include("ses_check.php");
include("dbconnection.php");


if (isset($_POST['btn_save'])) {
    date_default_timezone_set('Asia/Kathmandu');
    extract($_POST);
    //echo '<script type="text/javascript">alert("' .  $customer_id ." ".$customer_name. '"); </script>';
    $build_date=date('Y-m-d H:i:s');
    $sql_insert ="INSERT INTO `sales`(`date`, `f_price`, `remark`) VALUES ('$build_date','$subtotal','$remark')";//final sales report
    $res_insert = $conn->query($sql_insert);
    $last_sales_id =  mysqli_insert_id($conn);//increment from 1 by last data of column with AUTO INCREMENT
    $sales_id = $last_sales_id;

/*****************************************************************************************/
    $service = count($_POST['select_services']);
    echo '<script type="text/javascript">alert("' ."no of selection = $service".'");</script>';
    for ($i=0;$i<$service;$i++) {
        $sql_service = "INSERT into prod_sales(`sales_id`,`prod_id`, `qty`, `t_price`)values('$sales_id','$select_services[$i]','$quantity[$i]','$total[$i]')";


        $sql_cng="UPDATE `products` SET `quantity`= quantity-$quantity[$i] WHERE `id` =$select_services[$i] ";
        $result_cng=$conn->query($sql_cng);


        //echo '<script type="text/javascript">alert("' .$select_services[$i].'");</script>';
        $conn->query($sql_service);
    }
/************************************************************************************************/
    if ($customer_name!=="") {//new member
      $sql_ctmr="INSERT INTO `customer` (`cname`,`reg_date`,`t_buy`) VALUES ('$customer_name','$build_date',$subtotal)";
      $result_ctmr=$conn->query($sql_ctmr);
      $sql_main="SELECT * from `customer` where `cname`='$customer_name' AND  `reg_date`='$build_date'";
      $result_main=$conn->query($sql_main);
      //echo '<script type="text/javascript">alert("' ."$build_date".'");</script>';
      if ($result_main->num_rows > 0) {
        while($row = $result_main->fetch_assoc()) {
          echo '<script type="text/javascript">alert("'.$row['csid'].'");</script>';
          $customer_id=$row['csid'];
        }
      }
    }
    else {//old member
      $sql_main="SELECT * from `customer` where `csid`=$customer_id";
      $result_main=$conn->query($sql_main);
      if ($result_main->num_rows > 0) {
        while($row = $result_main->fetch_assoc()) {
          $subtotal=$row['t_buy']+$subtotal;
          //echo '<script type="text/javascript">alert("'.$row['cname'] ." ".$subtotal.'");</script>';
          $customer_name=$row['cname'];
          $sql_ctmr="UPDATE `customer` SET `t_buy`=$subtotal WHERE `csid` = $customer_id ";
          $result_ctmr=$conn->query($sql_ctmr);
        }
      }
    }
/********************************************************************************************************/
  $sql_ctmr_sales="INSERT INTO `ctmr_sales`(`cid`, `sales_id`) VALUES ($customer_id,$sales_id)";
  $conn->query($sql_ctmr_sales);
/*************************************************************************************************************/
  header('location:bill.php?csid='.$customer_id.'&cname='.$customer_name.'&sales_id='.$sales_id);
}else {
  header('location:sales.php');
}


?>
