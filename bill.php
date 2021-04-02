<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel="stylesheet" href="style/superDashboard.css" type="text/css" />
  <script src="jquery-3.5.1.js"></script>
  <script src="loder.js"></script>
	<style media="screen">
		.bodybill{
			width: 80%;
			margin: auto  10%;
		}
		.body {
			background-color: #dfe3ee;
			width:70%;
			margin: auto  15%;
			padding: auto;
			border-style: dashed;
			border-color: blue;
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
			width:80%;
			padding-top: 20px;
		}
		#bdate{
			width: 20%;
		}

	</style>
</head>
<body>
	<div id="load"></div>
	<div class="bodybill">
    <h1 id="p-title">BILL</h1>
    <hr>
		<div class="body">
			<div id="identity">
				<div id="address">
					977 Ramsailee Galli<br>
					OM chowk, Kathamandu<br>
					Phone: (977) 123-4567
				</div>
				<div id="logo">
					<h1 style="display:inline;">MeroPasal</h1>
					<!-- <img id="image" src="logo.png" alt="logo" /> -->
				</div>
			</div>
			<div id="customer">
				<div id="customer-title">
					<label for="cnanme">Id : </label>
					<output name="cname" id>3</output><br>
					<label for="cnanme">Name : </label>
					<output name="cname" id>Jai Prakash</output>
				</div>
				<table id="bdate">
					<tr>
						<td>Bill No.</td>
						<td>000123</td>
					</tr>
					<tr>
						<td class="meta-head">Date</td>
						<td><?php echo date('d/M/y'); ?></td>
					</tr>
				</table>
			</div>

			<table id="main_bill">
				<tr>
					<th>Item</th>
					<th>Description</th>
					<th>Unit Cost</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>
				<tr class="item-row">
					<td>
						<text>Web Updates</text>
					</td>
					<td>
						<text>Monthly web updates for http://widgetcorp.com (Nov. 1 - Nov. 30, 2009)</text>
					</td>
					<td>
						<text class="cost">$650.00</text>
					</td>
					<td>
						<text class="qty">1</text>
					</td>
					<td>
						<span class="price">$650.00</span>
					</td>
				</tr>

				<tr class="item-row">
					<td class="item-name">
						<div class="delete-wpr">SSL Renewals</div>
					</td>
					<td class="description"><text>Yearly renewals of SSL certificates on main domain and several subdomains</text></td>
					<td><text class="cost">$75.00</text></td>
					<td><text class="qty">3</text></td>
					<td><span class="price">$225.00</span></td>
				</tr>
				<tr>
					<td colspan="2">  </td>
					<td colspan="2"> Total</td>
					<td>
						<div id="subtotal">$875.00</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">  </td>
					<td colspan="2">Discount</td>
					<td>$875.00</td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td colspan="2"> Amount Paid</td>
					<td <text id="paid">$0.00</text></td>
				</tr>
			</table>
			<hr>
			<div id="terms">
				<h5>Terms</h5>
				<div>hami yestai tw ho ni boroo</div>
			</div>
		</div>
	</div>

</body>

</html>
