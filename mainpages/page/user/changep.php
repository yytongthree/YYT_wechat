<?php
	session_start();
	if($_GET['action']=='ok'){
	$newpwd=$_POST['newpwd'];
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$sql = "UPDATE register_info SET password='$newpwd' WHERE name='{$_SESSION['username']}'"; 
     //执行SQL语句  
	if(mysqli_query($conn,$sql)){
		echo $newpwd;
	}else {
		echo "0";
	}
     //释放记录集所占用的内存  
    mysqli_free_result($result);  
	mysqli_close($conn);
	}