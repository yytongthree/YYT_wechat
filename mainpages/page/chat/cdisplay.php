<html>
<head>
<title>Show the user's words</title>
<meta http-equiv="refresh" content="1;url=cdisplay.php">
</head>
<body>

<?php
	$DB=mysqli_connect("localhost","root","wenny673",'yyt_chat');

	$str="select * from myChatDB ORDER BY DATETIME;";
	$result=mysqli_query($DB,$str);
	
	$rows=mysqli_num_rows($result);
	@mysqli_data_seek($result,$rows-15);
	if ($rows<15) $l=$rows; else $l=15;
	for ($i=1;$i<=$l;$i++) {
		list($name,$words,$chattime)=mysqli_fetch_row($result);
		echo $chattime;
		echo " ";
		echo $name;
		echo ":";
		echo $words;
		echo "<br>";
	}
	@mysqli_data_seek($result,$rows-20);
	list($limittime)=mysqli_fetch_row($result);
	$str="DELETE FROM myChatDB WHERE DATETIME<'$limittime';";
	$result=mysqli_query($DB,$str);
	mysqli_close($DB);
?>
</body>
</html>
