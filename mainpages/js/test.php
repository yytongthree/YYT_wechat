<?php
//	session_start();
//	if($_GET['action']=='ok'){
//	$authority=$_POST['authority'];
	header('Content-type:text/json');
	$json='';
	$data=array();
	class User
	{
		public $inha_id;
		public $name;
		public $sex;
		public $age;
		public $num;
		public $addr;
		public $height;
		public $weight;
		public $TZZS;
		public $HR;
		public $BP;
		public $BMD;
		public $SS;
		public $INPR;
		public $hear;
		public $nickname;
	}
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$query = "SELECT * FROM inha_info WHERE nickname='wennyluo'"; 
     //执行SQL语句  
     $result = mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error());  
     //显示返回的记录集行数  
     if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){ 
		 	  $user=new User();
			  $user->inha_id=$row['inha_id'];
			  $user->name=$row['name'];
			  $user->sex=$row['sex'];
			  $user->age=$row['age'];
			  $user->num=$row['num'];
			  $user->addr=$row['addr'];
			  $user->height=$row['height'];
			  $user->weight=$row['weight'];
			  $user->TZZS=$row['TZZS'];
			  $user->HR=$row['HR'];
			  $user->BP=$row['BP'];
			  $user->BMD=$row['BMD'];
			  $user->SS=$row['SS'];
			  $user->INPR=$row['INPR'];
			  $user->hear=$row['hear'];
			  $user->nickname=$row['nickname'];
			  $data[]=$user;
         }   
		 $json=json_encode($data,JSON_UNESCAPED_UNICODE);
		 echo "{".'"user"'.":".$json."}"; 
     }else{
		 echo "failed!";
	 }
    
     //释放记录集所占用的内存  
     mysqli_free_result($result);  
	mysqli_close($conn);
//	}