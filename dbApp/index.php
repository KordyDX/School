<?php
require_once 'MySQL.php';

$mysql = new MySQL();
$mysql->connect();

$customers = $mysql->select("SELECT * FROM Customer");
$orders = $mysql->select("SELECT * FROM Orders");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
	<title>DB</title>
</head>

<body>
	<div class="Customers">
		<h2>Customer List</h2>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Country</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($customers as $customer) { ?>
					<tr>
						<td>
							<?= $customer['idCustomer'] ?>
						</td>
						<td>
							<?= $customer['CustomerName'] ?>
						</td>
						<td>
							<?= $customer['CustomerCountry'] ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="orders">
		<h2>Order List</h2>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Vehicle Name</th>
					<th>Color Name</th>
					<th>Make Year</th>
					<th>Customer ID</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($orders as $order) { ?>
					<tr>
						<td>
							<?= $order['idOrder'] ?>
						</td>
						<td>
							<?= $order['VehicleName'] ?>
						</td>
						<td>
							<?= $order['ColorName'] ?>
						</td>
						<td>
							<?= $order['MakeYear'] ?>
						</td>
						<td>
							<?= $order['Customer_idCustomer'] ?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</body>

</html>