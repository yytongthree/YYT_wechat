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
     $query = "SELECT * FROM inha_info WHERE nickname='{$_SESSION['username']}'"; 
     //执行SQL语句  
     $result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
			 $uname=$row['name'];
?>
<blockquote class="layui-elem-quote title"><big><b><?php echo $uname;?>的身体数据</b></big></blockquote>
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
				<col width="50%">
				<col width="25%">
				<col width="25%">
                 </colgroup>
         <thead>
				<tr>
					<th>身体指标</th>
					<th>数据</th>
					<th>单位</th>
				</tr> 
		    </thead>
		    <tbody>
			 <tr>
			 <td>身高(height)</td><td><?php echo $row['height'];?></td><td>cm</td>
             </tr>
             <tr>
			 <td>体重(weight)</td><td><?php echo $row['weight'];?></td><td>kg</td>
             </tr> 
			 <tr>
			 <td>BMI指数(TZZS)</td><td><?php echo $row['TZZS']?></td><td>kg/m²</td>
             </tr>
             <tr>
			 <td>心率(HR)</td><td><?php echo $row['HR'];?></td><td>bpm</td>
             </tr>
			 <tr>
			 <td>血压(BP)</td><td><?php echo $row['BP'];?></td><td>mmHg</td>
             </tr>
             <tr>
			 <td>血糖(BG)</td><td><?php echo $row['BG'];?></td><td>mmol/L</td>
             </tr> 
			 <tr>
			 <td>骨质密度(BMD)</td><td><?php echo $row['BMD'];?></td><td>g/cm³</td>
             </tr>
             <tr>
			 <td>视力(SS)</td><td><?php echo $row['SS'];?></td><td>（无单位）</td>
             </tr>
			 <tr>
			 <td>眼压(INPR)</td><td><?php echo $row['INPR'];?></td><td>mmHg</td>
             </tr>
             <tr>
			 <td>听力(hear)</td><td><?php echo $row['hear'];?></td><td>dB</td>
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