<?php
	//including the database connection file
	include("db_connection.php");
	
	//getting id of the data from url
	$id = $_GET['id'];
	
	//deleting the row from table
	$result = mysqli_query($mysqli, "DELETE FROM users WHERE id=$id");
	
	//display success message
	if($result){
		header('Location: index.php?delete=true');
	} else {
		header('Location: index.php?delete=false');
	}
?>