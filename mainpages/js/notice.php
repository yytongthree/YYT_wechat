<?php
	session_start();
//	if($_GET['action']=='ok'){
//	$authority=$_POST['authority'];
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}else{
		echo "success!<br/>";
	}
	
	$query = "SELECT * FROM inha_info WHERE nickname='{$_SESSION['username']}'"; 
     //执行SQL语句  
     $result = mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error());  
	 $arr=array();
     //显示返回的记录集行数  
     if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_assoc($result)){ 
		 	  array_push($arr,$row);
         }  
		 echo json_encode($arr,JSON_UNESCAPED_UNICODE);  
     } else{
		 echo "failed!";
	 }
     //释放记录集所占用的内存  
     mysqli_free_result($result);  
	mysqli_close($conn);
//	}