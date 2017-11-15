<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_chat");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	$sql = "CREATE TABLE mychatdb 
	(
		name varchar(20),
		words varchar(50),
		datetime timestamp
	)";
	if(mysqli_query($conn,$sql))
   {
		echo "<br>success";
	} else {
		echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
	}