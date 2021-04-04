<?php
include 'ses_check.php';
	include("dbconnection.php");

	$csid=$_GET['csid'];
	$cname=$_GET['cname'];
	$sales_id=$_GET['sales_id'];
	/*********************************/
	$sql_bill="SELECT p.name as prod_name, ps.qty as qty, p.sale_price as sale_price,ps.t_price as price  from `products` p, `prod_sales` ps, `sales` s, ctmr_sales cs where cs.cid=$csid and p.id=ps.prod_id and ps.sales_id=$sales_id and s.id=$sales_id and cs.sales_id=$sales_id";
	$result_bill=$conn->query($sql_bill);
	$sql_sale="SELECT discount, f_price FROM sales s, ctmr_sales cs WHERE id=$sales_id";
	$result_sale=mysqli_fetch_array($conn->query($sql_sale));

?>
<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="jquery-3.5.1.js"></script>
  <script src="loder.js"></script>
</head>
<body>
	<div id="load"></div>
	<div class="bodybill">
    <h1 id="p-title">BILL</h1>
    <hr>
		<div class="body" id="body">
			<style media="screen">
				#pasal_id{
					display: flex;
				}
				#address,#logo{
					margin: 1em;
					margin-bottom: auto;
					width: 50%;
				}
				.bodybill{
					width: 80%;
					margin: auto  10%;
				}
				.body {
					background-color: #dfe3ee;
					width:70%;
					margin: auto  15%;
					padding: auto;
					//border-style: dashed;
					//border-color: blue;
					display: block;
				  height: auto;
				  /* overflow-x: hidden;
				  overflow-y: auto; */
				  position: static;
				}

				table td,th{
					border: 1px solid;
					padding: 10px;
					text-align: center;
				}
				table {
			    border-collapse: collapse;
				}
				#customer{
					display: flex;
					margin: auto 2px;
				}
				#customer-title{
					width:65%;
					padding-top: 20px;
				}
				#bdate{
					margin-top: -5px;
					width: 28%;
				}
				#bdate td{
					border: 1px none;
					text-align: left;
				}
			</style>
			<div id="pasal_id">
				<div id="address">
					977 Ramsailee Galli<br>
					OM chowk, Kathamandu<br>
					Phone: (977) 123-4567
				</div>
				<div id="logo">
					<h1 style="margin-top:1px auto;">MeroPasal</h1>
					<!-- <img id="image" src="logo.png" alt="logo" /> -->
				</div>
			</div>
			<div id="customer">
				<div id="customer-title">
					<label for="cnanme">Id :</label>
					<output name="cname"><?php echo"$csid" ?></output><br>
					<label for="cnanme">Name :</label>
					<output name="cname"><?php echo"$cname" ?></output>
				</div>
				<table id="bdate">
					<tr>
						<td>Bill No.:</td>
						<td><?php echo"$sales_id" ?></td>
					</tr>
					<tr>
						<td class="meta-head">Date :</td>
						<td><?php echo date('d M y'); ?></td>
					</tr>
				</table>
			</div>

			<table id="main_bill" width="100%">
				<tr>
					<th width="10%">S.N.</th>
					<th>Item</th>
					<th width="10%">Quantity</th>
					<th width="15%">Rate</th>
					<th width="15%">Price</th>
				</tr>
					<?php
						$SN=1;
						//while ($SN <= 10) {
						foreach ($result_bill as $row){ ?>
							<tr class="item-row">
								<td>
									<?php echo $SN; ?>
								</td>
								<td>
									<?php echo $row['prod_name']; ?>
								</td>
								<td>
									<?php echo $row['qty']; ?>
								</td>
								<td>
									<?php echo $row['sale_price']; ?>
								</td>
								<td>
									<?php echo $row['price']; ?>
								</td>
							</tr>
							<?php
							$SN++;
					} ?>
				<tr>
					<td colspan="2" style="border:0;">  </td>
					<td colspan="2"> Total</td>
					<td>
						<div id="subtotal">
							<?php
							$f_price = sprintf("%.2f",$result_sale['discount']+$result_sale['f_price']);
							 echo "$f_price";
							 ?>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2" style="border:0;">  </td>
					<td colspan="2">Discount</td>
					<td><?php echo $result_sale['discount'] ; ?></td>
				</tr>
				<tr>
					<td colspan="2"style="border:0;"></td>
					<td colspan="2">Paid Amount</td>
					<td <text id="paid"><?php echo $result_sale['f_price']; ?></text></td>
				</tr>
			</table>
			<hr>
			<div id="terms">
				<i>Thank you for visiting us</i>
			</div>
			<p><b>Cashier</b><?php echo"	:	".$_SESSION['name']; ?></p>
		</div>
		<input type="button" name="print" value="Print" onclick="print();">
	</div>

</body>
<script type="text/javascript">
	function print(){
		var prtContent = document.getElementById("body");
		var WinPrint = window.open('', '', 'left=0,top=0,width=600,height=1100,toolbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prtContent.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		//WinPrint.print();
	//	WinPrint.close();
}
</script>
</html>



<?php
//     function nice_number($n) {
//         // first strip any formatting;
//         $n = (0+str_replace(",", "", $n));
//
//         // is this a number?
//         if (!is_numeric($n)) return false;
//
//         // now filter it;
//         if ($n > 1000000000000) return round(($n/1000000000000), 2).' trillion';
//         elseif ($n > 1000000000) return round(($n/1000000000), 2).' billion';
//         elseif ($n > 1000000) return round(($n/1000000), 2).' million';
//         elseif ($n > 1000) return round(($n/1000), 2).' thousand';
//
//         return number_format($n);
//     }
//
// echo nice_number('14120000'); //14.12 million

?>
