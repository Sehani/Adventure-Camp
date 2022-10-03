<?php
include 'inc/connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$toady = date('Y-m-d H:i:s');


	$check_in_date = $_POST['check_in_date'];
	$check_out_date = $_POST['check_out_date'];
	$cust_id = $_POST['cust_id'];
	$First_name = $_POST['First_name'];
	$Last_name = $_POST['Last_name'];
	$contact_number = $_POST['contact_number'];
	$email = $_POST['email'];
	$Package = $_POST['packid'];
	$adults = $_POST['adults'];
	$children = $_POST['children'];
	$no_of_rooms = $_POST['no_of_rooms'];
	$no_of_tents = $_POST['no_of_tents'];
	$Room_type = $_POST['Room_type'];
	$Tent_type = $_POST['Tent_type'];
	$Meals_type = $_POST['Meals_type'];
	$packPrice = $_POST['packPrice'];

	if(isset($_POST['activitySelect'])){
		$activity_count         = count($_POST['activitySelect']);
		
	}else{
		$activity_count = 0;
	}


	for ($b = 0; $b < $activity_count; $b++) {

		$activity_id = $_POST['activitySelect'][$b];

		$sqlActNAMe = "SELECT * FROM camp_activity WHERE aid='$activity_id'";
		$result_ActNAMe = mysqli_query($conn, $sqlActNAMe);
		$rowActNAMe = mysqli_fetch_assoc($result_ActNAMe);

	    $xtreaActPrice += $rowActNAMe["ac_price"];	

	}

		


	$totalPeople = $adults + $children;

	$sql_room = "SELECT * FROM rooms WHERE id='$Room_type'";
	$result_room = mysqli_query($conn, $sql_room);
	$row_room = mysqli_fetch_assoc($result_room);

	$singler_price = $row_room["price"];

	$room_price = $singler_price * $no_of_rooms;

	// meals totla

	$sql_meal = "SELECT * FROM `meals` WHERE `id` = '$Meals_type'";
	$result_meal = mysqli_query($conn, $sql_meal);
	$row_meal = mysqli_fetch_assoc($result_meal);

	$singlem_price = $row_meal["price"];
	$meal_price = $singlem_price * 10;

	// tent total
	$sql_tent = "SELECT * FROM `tent` WHERE `id` = '$Tent_type'";
	$result_tent = mysqli_query($conn, $sql_tent);
	$row_tent = mysqli_fetch_assoc($result_tent);

	$singlet_price = $row_tent["price"];
	$tent_price = $singlet_price * $no_of_tents;

	echo $xtreaActPrice;

	$total = ($tent_price + $packPrice + $room_price + $meal_price + $xtreaActPrice) * $totalPeople;


	$sql = "INSERT INTO booking (check_in_date, check_out_date, customer_id, first_name, last_name, contact_number, email, pack_id, no_of_rooms, no_of_tents, room_type, tent_type, meals_type, paid_status, add_date, due_amount, adults, childern, no_of_people)
VALUES ('$check_in_date', '$check_out_date', '$cust_id', '$First_name' , '$Last_name', '$contact_number', '$email', '$Package', '$no_of_rooms', '$no_of_tents', '$Room_type','$Tent_type', '$Meals_type', 'unpaid', '$toady', '$total', '$adults', '$children', '$totalPeople')";

	if (mysqli_query($conn, $sql)) {

		$last_id = mysqli_insert_id($conn);
		$sql_payment = "INSERT INTO payments (customer_id , booking_id, date , status, total) VALUES ('$cust_id', '$last_id', '$toady', 'unpaid', '$total')";

		if (mysqli_query($conn, $sql_payment)) {

			echo "New record created successfully";
		}
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}

	for ($a = 0; $a < $activity_count; $a++) {

		$activity_id = $_POST['activitySelect'][$a];

		$sql_activity = "INSERT INTO booking_activity (`book_id`, activity_id, date) VALUES ('$last_id', '$activity_id', '$toady')";
		$result_activity = mysqli_query($conn, $sql_activity);
	}
}
