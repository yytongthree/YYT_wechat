<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
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
     $query = "SELECT name,inha_ID FROM inha_info WHERE nickname='{$_SESSION['username']}'"; 
     //执行SQL语句  
     $result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
			 $uname=$row['name'];
			 $uID=$row['inha_ID'];
		 }
	 }
?>
<blockquote class="layui-elem-quote title"><big><b><?php echo $uname;?>的诊断信息</b></big></blockquote>
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
				<col width="50%">
				<col width="30%">
                <col width="10%">
                <col width="10%">
                 </colgroup>
         <thead>
				<tr>
					<th>症状</th>
					<th>结论</th>
                    <th>诊断时间</th>
                    <th>诊断医生</th>
				</tr> 
		    </thead>
		    <tbody>
<?php
			$query = "SELECT * FROM diagnosis WHERE pation_ID='{$uID}'"; 
     		//执行SQL语句  
     		$result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 		if(mysqli_num_rows($result)>0){  
         	//如果返回的数据集行数大于0，则开始以表格的形式显示   
         		while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>".$row['symptom']."</td>";
					echo "<td>".$row['conclu']."</td>";
					echo "<td>".$row['diag_time']."</td>";
					echo "<td>".$row['doc_name']."</td>";
					echo "</tr>";
         		}    
     		}  
     		else{  
         		echo "记录未找到！";  
     		}  
			echo "</table>";
     //释放记录集所占用的内存  
     mysqli_free_result($result);  
     //关闭该数据库连接  
     mysqli_close($connection);  
 ?>
            </tbody>
		</table>
</body>
</html>