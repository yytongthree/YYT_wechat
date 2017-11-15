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
	<blockquote class="layui-elem-quote title"><big><b>药房库存</b></big></blockquote>
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
                <col width="5%">
                <col width="25%">
                <col width="25%">
                <col width="25%">
                <col width="10%">
                <col width="10%">
                 </colgroup>
            <thead>
                 <tr>
					<th>药名</th>
					<th>功效</th>
					<th>禁忌</th>
                    <th>不良反应</th>
                    <th>注意事项</th>
                    <th>库存数量</th>
				</tr> 
		    </thead>
		    <tbody>
<?php

	$conn=mysqli_connect("localhost","root","wenny673","yyt_info") or die("Unable to connect!");
	function showTable($conn,$table_name){ 
		$sql = "select * from $table_name";
		$res = mysqli_query($conn,$sql);
		//循环取出数据
		if(mysqli_num_rows($res)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
			while($row=mysqli_fetch_array($res)){ 
				echo "<tr>";
					echo "<td>".$row['MN']."</td>";
					echo "<td>".$row['function']."</td>";
					echo "<td>".$row['tabu']."</td>";
					echo "<td>".$row['AR']."</td>";
					echo "<td>".$row['notes']."</td>";
					echo "<td>".$row['count']."</td>";
				echo "</tr>";
			}
		mysqli_free_result($res); 
		}
	}
	showTable($conn,"medicine");
	mysqli_close($conn);
 ?>
            </tbody>         
		</table>
</body>
</html>