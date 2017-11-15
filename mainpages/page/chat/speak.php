<?php session_start();?>
<html>
<head>
<title>Speaking</title>
</head>
<body>
<?php
	$nick = $_SESSION["username"];
	$words = $_POST["words"];
	if ($words)
	{
	$DB = mysqli_connect("localhost","root","wenny673",'yyt_chat');
	$str="INSERT INTO myChatDB(name,words) values('$nick','$words');";
	mysqli_query($DB,$str);
	mysqli_close($DB);
	}
?>
<form action="speak.php" method="post" target="_self">
	<input type="text" name="words" cols="40">
	<input type="submit" value="Send">
</form>
</body>
</html>
