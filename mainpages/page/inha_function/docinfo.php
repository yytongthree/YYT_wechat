<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../../css/news.css" media="all" />
<title>无标题文档</title>
</head>

<body>
<?php
	//连接数据库的参数  
     $host = "localhost";  
     $user = "root";  
     $pass = "wenny673";  
     $db = "yyt_info";  
     //创建一个mysql连接  
     $connection = mysqli_connect($host, $user, $pass,$db) or die("Unable to connect!");   
     //开始查询  
     $query = "SELECT name FROM inha_info WHERE nickname='{$_SESSION['username']}'"; 
     //执行SQL语句  
     $result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
			 $uname=$row['name'];
		 }
	 }
?>
<blockquote class="layui-elem-quote title"><big><b><?php echo $uname;?>的签约医生信息</b></big></blockquote>
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
				<col width="20%">
				<col width="80%">
                 </colgroup>
         <thead>
				<tr>
					<th>项目</th>
					<th>内容</th>
				</tr> 
		    </thead>
            <tbody>
<?php
		    //开始查询  
     		$query = "SELECT doc_ID FROM doc_inha WHERE inha_name='{$uname}'"; 
     		//执行SQL语句  
     		$result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 		if(mysqli_num_rows($result)>0){  
         	//如果返回的数据集行数大于0，则开始以表格的形式显示   
         		while($row=mysqli_fetch_array($result)){
					$uID=$row['doc_ID'];
				}
			}
			
			$query = "SELECT * FROM docter_info WHERE doc_ID='{$uID}'"; 
     		//执行SQL语句  
     		$result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 		if(mysqli_num_rows($result)>0){  
         	//如果返回的数据集行数大于0，则开始以表格的形式显示   
         		while($row=mysqli_fetch_array($result)){
?>
			 <tr>
			 <td>医生编号</td><td><?php echo $row['doc_ID'];?></td>
             </tr>
             <tr>
			 <td>医生姓名</td><td><?php echo $row['name'];?></td>
             </tr> 
			 <tr>
			 <td>性别</td><td><?php echo $row['sex']?></td>
             </tr>
             <tr>
			 <td>年龄</td><td><?php echo $row['age'];?></td>
             </tr>
			 <tr>
			 <td>电话</td><td><?php echo $row['num'];?></td>
             </tr>
             <tr>
			 <td>擅长科目</td><td><?php echo $row['GS'];?></td>
             </tr> 
			 <tr>
			 <td>曾获荣誉</td><td><?php echo $row['awards'];?></td>
             </tr>
             <tr>
			 <td>管辖区域</td><td><?php echo $row['RA'];?></td>
             </tr>
			 <tr>
			 <td>签约人数</td><td><?php echo $row['SN'];?></td>
             </tr>
             <tr>
			 <td>注册昵称</td><td><?php echo $row['nickname'];?></td>
             </tr>
<?php
         }  
         echo "</table>";  
     }  
     else{  
         echo "记录未找到！";  
     }  
     //释放记录集所占用的内存  
     mysqli_free_result($result);  
     //关闭该数据库连接  
     mysqli_close($connection);  
 ?>
            </tbody>
		</table>
</body>
</html>