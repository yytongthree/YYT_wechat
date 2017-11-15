<?php
	session_start();
	$NO=$_REQUEST["NO"]; 
    $department=$_REQUEST["department"]; 
	$name=$_REQUEST["name"];
	$sex=$_REQUEST["sex"];
	$age=$_REQUEST["age"];
	$fee_type=$_REQUEST["fee_type"];
	$addr=$_REQUEST["addr"];
	$num=$_REQUEST["num"];
	$pri_diagnosis=$_REQUEST["pri_diagnosis"];
	$year=$_REQUEST["year"];
	$month=$_REQUEST["month"];
	$day=$_REQUEST["day"];
	$cfd=$_REQUEST["cfd"];
	$medical_advice=$_REQUEST["medical_advice"];
	
	$conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	}
	
	$query="select name from docter_info where nickname='{$_SESSION['username']}'";
	$result = mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
			 $uname=$row['name'];
         }    
     }  
	 mysqli_free_result($result);
	
	$sql="INSERT INTO ele_prescription (NO,department,inha_name,sex,age,fee_type,addr,num,pri_diagnosis,year,month,day,rp,doc_name,dispensing_doc,check_doc,medical_advice) VALUES('{$NO}','{$department}','{$name}','{$sex}','{$age}','{$fee_type}','{$addr}','{$num}','{$pri_diagnosis}','{$year}','{$month}','{$day}','{$cfd}','{$uname}','{$uname}','{$uname}','{$medical_advice}')";
   	if(mysqli_query($conn,$sql)){
?>
		<script type="text/javascript"> 
    		alert("提交成功"); 
    		window.location.href="ele_prescription.php"; 
 		</script>
<?php
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close ( $conn ); 
?>