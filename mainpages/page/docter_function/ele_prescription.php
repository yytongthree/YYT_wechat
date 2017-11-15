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
	//查询该医生的姓名
	//连接数据库的参数  
     $host = "localhost";  
     $user = "root";  
     $pass = "wenny673";  
     $db = "yyt_info";  
     //创建一个mysql连接  
     $connection = mysqli_connect($host, $user, $pass,$db) or die("Unable to connect!");   
     //开始查询  
     $query = "SELECT name FROM docter_info WHERE nickname='{$_SESSION['username']}'"; 
     //执行SQL语句  
     $result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error()); 
	 if(mysqli_num_rows($result)>0){  
         //如果返回的数据集行数大于0，则开始以表格的形式显示   
         while($row=mysqli_fetch_array($result)){
			 $uname=$row['name'];
		 }
	 }
	 
	 //查询该医生名下的签约用户
	 $query = "SELECT inha_name FROM doc_inha WHERE doc_name='{$uname}'"; 
     //执行SQL语句  
     $result = mysqli_query($connection,$query) or die("Error in query: $query. ".mysqli_error());
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
		<form name="form1" enctype="multipart/form-data" method="post" action="insertprescription.php"> 
			<table width="617" border="0">
				<tr>
					<td width="337">NO:
						<label for="NO"></label>
						<input name="NO" type="text" id="NO" size="13" maxlength="10" />
					</td>
					<td width="23">&nbsp;</td>
					<td width="223">科别：
						<select name="department" id="department">
							<option value="一般内科">一般内科</option>
							<option value="一般外科">一般外科</option>
							<option value="耳喉鼻科">耳喉鼻科</option>
							<option value="胸腔内科">胸腔内科</option>
							<option value="泌尿科">泌尿科</option>
							<option value="牙科">牙科</option>
							<option value="骨科">骨科</option>
							<option value="妇科">妇科</option>
							<option value="脑神经外科">脑神经外科</option>
							<option value="小儿科">小儿科</option>
							<option value="心脏科">心脏科</option>
						</select>
					 </td>
					<td width="16">&nbsp;</td>
				</tr>
				<tr>
					<td>姓名：
						<select name="name" id="name">
							<option value="">请选择用户</option>
							<?php 
								if(mysqli_num_rows($result)>0){  
								//如果返回的数据集行数大于0，则开始以表格的形式显示   
									while($row=mysqli_fetch_array($result)){
										$inha_name=$row['inha_name'];
							?>
							<option value="<?php echo $inha_name;?>"><?php echo $inha_name;?></option>
							<?php
									}
								}
							?>
						</select>
						<div id="apDiv7">性别：
							<select name="sex" id="sex">
								<option value="男">男</option>
								<option value="女">女</option>
							</select>
						</div>
                    </td>
					<td>&nbsp;</td>
					<td>年龄：
						<label for="age"></label>
							<input name="age" type="text" id="age" size="4" />
					岁</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>费别：
						<select name="fee_type" id="fee_type">
							<option value="自费">自费</option>
							<option value="企业保险">企业保险</option>
							<option value="国家救助">国家救助</option>
						</select>
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>地址：
						<label for="addr"></label>
						<input name="addr" type="text" id="addr" size="32" />
                    </td>
					<td>&nbsp;</td>
					<td> 电话：
						<label for="num"></label>
						<input name="num" type="text" id="num" size="11" maxlength="11" />
                    </td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>
                    	<table width="303" border="0">
							<tr>
								<td width="66" nowrap="nowrap">初步诊断：</td>
								<td width="227">
                                	<textarea name="pri_diagnosis" id="pri_diagnosis" cols="29" rows="6"></textarea>
                                </td>
							</tr>
						</table>
                    	<label for="pri_diagnosis"></label>
                    </td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>开方日期：
						<label for="year"></label>
						<input name="year" type="text" id="y" size="1" maxlength="4" />年
						<label for="month"></label>
						<input name="month" type="text" id="month" size="1" maxlength="2" />月
						<label for="day"></label>
						<input name="day" type="text" id="day" size="1" maxlength="2" />日
					</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
			<p class="cfq">Rp</p>
			<p class="cfq">
				<label for="cfd"></label>
				<textarea name="cfd" id="cfd" cols="82" rows="9"></textarea>
			</p>
			<p class="cfq">&nbsp;</p>
			<table width="296" border="0">
				<tr>
					<td width="89" height="80" nowrap="nowrap" class="zh">医师：</td>
					<td width="197">
                    	<span class="zh">
						<textarea name="doc_name" cols="20" rows="5" class="yis" disabled id="doc_name"><?php echo $uname;?></textarea>
						</span>
					</td>
				</tr>
			</table>
			<p class="zh">&nbsp;</p>
			<p class="zh">
				<label for="textarea"></label>
			</p>
			<div class="zh" id="apDiv5">
				<label for="pyys"></label>
				<table width="259" height="69" border="0">
					<tr>
						<td width="94" height="63" nowrap="nowrap">配药医师：</td>
						<td width="155"><textarea name="dispensing_doc" id="dispensing_doc" cols="17" disabled rows="4"><?php echo $uname;?></textarea></td>
					</tr>
				</table>
			</div>
			<div class="zh" id="apDiv6">
				<label for="fhys"></label>
				<table width="256" border="0">
					<tr>
						<td width="92" height="74" nowrap="nowrap">复核医师：</td>
						<td width="154"><textarea name="check_doc" id="check_doc" cols="17" disabled rows="4"><?php echo $uname;?></textarea></td>
					</tr>
				</table>
			</div>
			<p class="cfq">医嘱： 
				<textarea name="medical_advice" cols="64" class="zh" id="medical_advice"></textarea>
			</p>
            <p align="center">
            <button class="layui-btn">提交</button>
            </p>
		</form>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
    <?php
		mysqli_close ( $connection ); 
	?>
</body>
</html>
