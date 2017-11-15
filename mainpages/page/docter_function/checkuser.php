<?php
	$conn=mysqli_connect("localhost","root","wenny673","yyt_info");
	if(!$conn){
		die('Could not connect:'.mysqli_error());
	}
	
	$sql="SELECT name FROM docter_info WHERE nickname='wennyli'";
	$result = mysqli_query($conn,$sql) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){
		 while($row=mysqli_fetch_array($result)){
			 $uname=$row['name'];
		 }
	 }
	 
	$sql="SELECT inha_name FROM doc_inha WHERE doc_name='$uname'";
	$i=0;
	$result = mysqli_query($conn,$sql) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){
		 while($row=mysqli_fetch_array($result)){
			 $inha_name[$i]=$row['inha_name'];
			 $i++;
		 }
		 $count1=$i;
	 }
	 
	 $j=0;
	 for($i=0;$i<$count1;$i++)
	 {
		 $sql="SELECT nickname,num,sex,age,name,addr FROM inha_info WHERE name='{$inha_name[$i]}'";
		 $result = mysqli_query($conn,$sql) or die("Error in query: $query. ".mysqli_error()); 
		 if(mysqli_num_rows($result)>0){
		 	while($row=mysqli_fetch_array($result)){
				$nickname[$j]=$row['nickname'];
				$num[$j]=$row['num'];
				$sex[$j]=$row['sex'];
				$age[$j]=$row['age'];
				$name[$j]=$row['name'];
				$addr[$j]=$row['addr'];
				$j++;
		 	}
		}
		$count2=$j;
	 }
	 
	 for($j=0;$j<$count2;$j++)
	 {
		 echo $nickname[$j];
		 echo '<br>';
		 echo $num[$j];
		 echo '<br>';
		 echo $sex[$j];
		 echo '<br>';
		 echo $age[$j];
		 echo '<br>';
		 echo $name[$j];
		 echo '<br>';
		 echo $addr[$j];
	 }
	 
	 mysqli_close($conn);