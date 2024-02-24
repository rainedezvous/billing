<?php
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$email = $_POST['email'];
	$payment = $_POST['mop'];
	$houseadd = $_POST['houseadd'];
	$city = $_POST['city'];
	$barangay = $_POST['barangay'];
	$zipcode = $_POST['zipcode'];

    // DATABASE CONNECT

	$conn = new mysqli('localhost','root','','db_billing');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(f_name, l_name, email, mop, houseadd, city, barangay, zipcode) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssssi", $f_name, $l_name, $email, $payment, $houseadd, $city, $barangay, $zipcode);
		$execval = $stmt->execute();
		echo $execval;
		echo "Proceed to the payment";
		$stmt->close();
		$conn->close();
	}

	// DATABASE CONNECT (PRINT)
	$con=mysqli_connect('localhost','root','','db_billing');
		if (mysqli_connect_errno())
			{ 
				echo 'Failed to connect to the database.'.mysqli_connect_error();
			}
?>
