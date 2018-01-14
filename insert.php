<?php
//including the database connection file
include_once("db_connection.php");

if(isset($_POST)) {	
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$userId = $_POST['userId'];
		
	//insert data to database
	if($userId != null){
		$result = mysqli_query($mysqli, "UPDATE users SET name='$name',phone='$phone',email='$email' WHERE id=$userId") or die(mysqli_error($mysqli));
	} else {
		$result = mysqli_query($mysqli, "INSERT INTO users(name,phone,email) VALUES('$name','$phone','$email')") or die(mysqli_error($mysqli));
	}
	
	//display success message
	if($result){
		header('Location: index.php?success=true');
	} else {
		header('Location: index.php?success=false');
	}
}
?>