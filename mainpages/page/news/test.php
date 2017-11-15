<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/font_eolqem241z66flxr.css" media="all" />
	<link rel="stylesheet" href="../../css/news.css" media="all" />
<title>测试</title>
</head>

<body>
<?php
	$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
	if (!$conn)
	{
		die('Could not connect: ' . mysqli_error());
	}
	
	$query = "SELECT * FROM essay";
	$result = mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
?>
	<div class="layui-form">
	  	<table class="layui-table">
		    <colgroup>
				<col width="50%">
				<col width="25%">
				<col width="25%">
                 </colgroup>
         <thead>
				<tr>
					<th>文章标题</th>
					<th>作者</th>
					<th>链接</th>
				</tr> 
		    </thead>
            <tbody>
			 <tr>
			 <td><?php echo $row['title'];?></td>
             <td><?php echo $row['origin'];?></td>
             <td>
             	<a href="<?php echo $row['content'];?>"></a>
             </td>
             </tr>
             </tbody>
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
     mysqli_close($conn); 
?>
</tbody>
		</table>
</body>
</html>