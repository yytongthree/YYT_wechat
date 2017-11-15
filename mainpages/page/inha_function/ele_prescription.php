<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>无标题文档</title>
    <link rel="stylesheet" href="../../css/prescription.css" media="all" />
</head>

<body class="ys">
<?php
	//查询该用户的姓名
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
	 
	 //查询该医生名下的签约用户
	$query = "SELECT * FROM ele_prescription WHERE inha_name='{$uname}'"; 
     //执行SQL语句  
	$result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error());
	if(mysqli_num_rows($result)>0){
		//如果返回的数据集行数大于0，则开始以表格的形式显示   
		while($row=mysqli_fetch_array($result)){
			$NO=$row["NO"]; 
			$department=$row["department"]; 
			$name=$row["inha_name"];
			$sex=$row["sex"];
			$age=$row["age"];
			$fee_type=$row["fee_type"];
			$addr=$row["addr"];
			$num=$row["num"];
			$pri_diagnosis=$row["pri_diagnosis"];
			$year=$row["year"];
			$month=$row["month"];
			$day=$row["day"];
			$rp=$row["rp"];
			$doc_name=$row["doc_name"];
			$dispensing_doc=$row["dispensing_doc"];
			$check_doc=$row["check_doc"];
			$medical_advice=$row["medical_advice"];
		}
	}
?>
	<p class="ys">本处方由王美丽电子签名</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<div class="zt" id="apDiv1"> 跳伞塔社区卫生医院</div>
	<div class="zh" id="apDiv2">
		<table width="67" height="65" border="1" cellpadding="0" cellspacing="0">
    		<tr>
      			<td width="63" height="63">普通药      品处方</td>
    		</tr>
  		</table>
		<p>&nbsp;</p>
	</div>
	<div class="cfq" id="apDiv3">处方签</div>
	<div id="apDiv4">
			<table width="617" border="0">
				<tr>
					<td width="337">NO:
						<?php echo $NO;?>
					</td>
					<td width="23">&nbsp;</td>
					<td width="223">科别：
						<?php echo $department;?>
					 </td>
					<td width="16">&nbsp;</td>
				</tr>
				<tr>
					<td>姓名：
						<?php echo $name;?>
						<div id="apDiv7">性别：
							<?php echo $sex;?>
						</div>
                    </td>
					<td>&nbsp;</td>
					<td>年龄：
						<?php echo $age;?>
					岁</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>费别：
						<?php echo $fee_type;?>
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>地址：
						<?php echo $addr;?>
                    </td>
					<td>&nbsp;</td>
					<td> 电话：
						<?php echo $num;?>
                    </td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
                    	<table width="303" border="0">
							<tr>
								<td width="66" nowrap="nowrap">初步诊断：</td>
								<td width="227">
                                	<textarea name="pri_diagnosis" id="pri_diagnosis" disabled cols="29" rows="6"><?php echo $pri_diagnosis;?></textarea>
                                </td>
							</tr>
						</table>
                    </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>开方日期：
						<?php echo $year;?>年
						<?php echo $month;?>月
						<?php echo $day;?>日
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<p class="cfq">Rp</p>
			<p class="cfq">
            	<textarea name="cfd" id="cfd" cols="82" rows="9" disabled><?php echo $rp;?></textarea>
			</p>
			<p class="cfq">&nbsp;</p>
			<table width="296" border="0">
				<tr>
					<td width="89" height="80" nowrap="nowrap" class="zh">医师：</td>
					<td width="197">
                    	<span class="zh">
                        <textarea name="doc_name" cols="20" rows="5" class="yis" disabled id="doc_name">
						<?php echo $doc_name;?>
                        </textarea>
						</span>
					</td>
				</tr>
			</table>
			<p class="zh">&nbsp;</p>
			<p class="zh">
			</p>
			<div class="zh" id="apDiv5">
				<table width="259" height="69" border="0">
					<tr>
						<td width="94" height="63" nowrap="nowrap">配药医师：</td>
						<td width="155"><textarea name="dispensing_doc" id="dispensing_doc" cols="17" disabled rows="4"><?php echo $dispensing_doc;?></textarea></td>
					</tr>
				</table>
			</div>
			<div class="zh" id="apDiv6">
				<table width="256" border="0">
					<tr>
						<td width="92" height="74" nowrap="nowrap">复核医师：</td>
						<td width="154"><textarea name="check_doc" id="check_doc" cols="17" disabled rows="4"><?php echo $check_doc;?></textarea></td>
					</tr>
				</table>
			</div>
			<p class="cfq">医嘱： 
            <?php echo $medical_advice;?>
			</p>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
    <?php
		mysqli_close ( $connection ); 
	?>
</body>
</html>
