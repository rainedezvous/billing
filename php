<?php
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$email = $_POST['email'];
	$mop = $_POST['mop'];
	$houseadd = $_POST['houseadd'];
	$total_amount = $_POST['total_amount'];
	$date_paid = $_POST['date_paid'];

    // DATABASE CONNECT

	$conn = new mysqli('localhost','root','','db_billing');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into tbl_billing(f_name, l_name, email, mop, houseadd, total_amount, date_paid) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $f_name, $l_name, $email, $mop, $houseadd, $total_amount, $date_paid);
		$execval = $stmt->execute();
		echo $execval;
		echo "Proceed to the payment";
		$stmt->close();
		$conn->close();
	}
?>
