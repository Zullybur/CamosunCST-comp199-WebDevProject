<?php
	include "../../../database.inc.php";

	if (isset($_POST['submit'])) {
		$file = $_FILES['file']['tmp_name'];

		$tableSelect = $_POST['table'];
		switch ($tableSelect) {
			case 0:
				$table = 'Inventory';
				break;
			case 1:
				$table = 'Model';
				break;
			case 2:
				$table = 'Customers';
				break;
			case 3:
				$table = 'Orders';
				break;
			case 4:
				$table = 'Payments';
				break;			
			default:
				$table = 'Inventory';
				break;
		}
		print_r($table);

		$handle = fopen($file,"r");

		while(($fileop = fgetcsv($handle, 1000, ",")) !== FALSE) {
			switch ($table) {
				case 'Inventory':
					$inventory = array($fileop[0], $fileop[1], $fileop[2], $fileop[3], $fileop[4]);
					
					$sql = mysqli_query($link, "INSERT INTO $table (serial_no, name, location, available, Model_model_no)
						VALUES ($inventory[0], '$inventory[1]', '$inventory[2]', $inventory[3], $inventory[4])");
					break;
				case 'Model':
					$model = array($fileop[0], $fileop[1], $fileop[2], $fileop[3], $fileop[4], $fileop[5], $fileop[6],
						$fileop[7], $fileop[8], $fileop[9], $fileop[10], $fileop[11], $fileop[12], $fileop[13]);

					$sql = mysqli_query($link, "INSERT INTO $table (model_no, model_name, length, brand, price, beds, 
						baths, year_built, draft, class, tonnage, cruising_speed, description) 
						VALUES ($model[0], '$model[1]', $model[2], '$model[3]', $model[4], $model[5], $model[6], $model[7], $model[8],
							 $model[9], '$model[10]', $model[11], $model[12], '$model[13]')");
					break;
				case 'Customers':
					$customers = array($fileop[0], $fileop[1], $fileop[2], $fileop[3], $fileop[4], $fileop[5], $fileop[6],
						$fileop[7], $fileop[8], $fileop[9]);

					$sql = mysqli_query($link, "INSERT INTO $table (first_name, last_name, address, city, postal_code, country,
					 	province, email, password, phone) 
						VALUES ('$customers[0]', '$customers[1]', '$customers[2]', '$customers[3]', '$customers[4]', '$customers[5]', 
							'$customers[6]', '$customers[7]', '$customers[8]', '$customers[9]')");
					break;
				case 'Orders':
					$orders = array($fileop[0], $fileop[1], $fileop[2], $fileop[3], $fileop[4], $fileop[5]);
					$sql = mysqli_query($link, "INSERT INTO $table (serial_no, completed, quantity, price, amount_outstanding,
						delivered, Customers_customer_id)
						VALUES ($orders[0], $orders[1], $orders[2], $orders[3], $orders[4], $orders[5])");

					break;
				case 'Payments':
					$payments = array($fileop[0], $fileop[1], $fileop[2], $fileop[3]);
					$query =  "INSERT INTO $table (amount, payment_date, verified, Orders_order_id, Orders_serial_no) 
						VALUES ($payments[0], $payments[1], $payments[2], $payments[3], $payments[4])";
					$sql = mysqli_query($link,$query);

					break;
				default:
					break;	
			}

			if ($sql) {
				echo "Data transfer successful";
			}
			else {
				echo "Failed ".mysqli_error($link)."<br>";
			}
		}	
	}	
?>
<html lang="en">
<head>
	<title>Upload data</title>
</head>
<body>
	<form method="post" action="insert.php" enctype="multipart/form-data">
		<input type="file" name="file">
		<select name="table">
			<option name="0" value="0">Inventory</option>
			<option name="1" value="1">Model</option>
			<option name="2" value="2">Customers</option>
			<option name="3" value="3">Orders</option>
			<option name="4" value="4">Payments</option>
		</select>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
