<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
	<meta charset="utf-8">
	<title>个人资料--layui后台管理模板</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="../../layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="../../css/user.css" media="all" />
</head>
<body class="childrenBody">
	<form class="layui-form">
		<div class="user_left">
			<div class="layui-form-item">
			    <label class="layui-form-label">用户名</label>
			    <div class="layui-input-block">
			    	<input type="text" value="<?php echo $_SESSION['username'];?>" disabled class="layui-input layui-disabled">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">用户组</label>
			    <div class="layui-input-block">
                <?php
					$conn = mysqli_connect("localhost","root","wenny673","yyt_info");
					if (!$conn){
						die('Could not connect: ' . mysqli_error());
					}
	
					$query = "SELECT authority FROM register_info WHERE name='{$_SESSION['username']}'"; 
     				//执行SQL语句  
     				$result = mysqli_query($conn,$query) or die("Error in query: $query. ".mysqli_error());  
     				//显示返回的记录集行数  
     				if(mysqli_num_rows($result)>0){  
         			//如果返回的数据集行数大于0，则开始以表格的形式显示   
         				while($row=mysqli_fetch_row($result)){ 
		 	 				$authority=$row[0];  
         				}    
     				}
					switch($authority){
						case "1":{
				?>
                <input type="text" value="非签约用户" disabled class="layui-input layui-disabled">
                <?php
						break;}
						case "2":{
				?>
                <input type="text" value="签约用户" disabled class="layui-input layui-disabled">
                <?php
						break;}
						case "3":{
				?>
                <input type="text" value="医生" disabled class="layui-input layui-disabled">
                <?php
						}
					}
     				//释放记录集所占用的内存  
    				mysqli_free_result($result);  
					mysqli_close($conn); 
				?>

			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">真实姓名</label>
			    <div class="layui-input-block">
			    	<input type="text" value="" placeholder="请输入真实姓名" lay-verify="required" id="truename" class="layui-input">
			    </div>
			</div>
			<div class="layui-form-item" pane="">
			    <label class="layui-form-label">性别</label>
			    <div class="layui-input-block">
			    	<input type="radio" name="sex" value="男" title="男" checked="">
	     			<input type="radio" name="sex" value="女" title="女">
	     			<input type="radio" name="sex" value="保密" title="保密">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">手机号码</label>
			    <div class="layui-input-block">
			    	<input type="tel" value="" placeholder="请输入手机号码" id="tel" lay-verify="required|phone" class="layui-input">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">出生年月</label>
			    <div class="layui-input-block">
			    	<input type="text" value="" placeholder="请输入出生年月" lay-verify="required|date" onclick="layui.laydate({elem: this,max: laydate.now()})" class="layui-input">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">家庭住址</label>
			    <div class="layui-input-inline">
	                <select name="province" lay-filter="province">
	                    <option value="">请选择省</option>
	                </select>
	            </div>
	            <div class="layui-input-inline">
	                <select name="city" lay-filter="city" disabled>
	                    <option value="">请选择市</option>
	                </select>
	            </div>
	            <div class="layui-input-inline">
	                <select name="area" lay-filter="area" disabled>
	                    <option value="">请选择县/区</option>
	                </select>
	            </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">邮箱</label>
			    <div class="layui-input-block">
			    	<input type="text" value="" placeholder="请输入邮箱" lay-verify="required|email" class="layui-input">
			    </div>
			</div>
			<div class="layui-form-item">
			    <label class="layui-form-label">自我评价</label>
			    <div class="layui-input-block">
			    	<textarea placeholder="请输入内容" class="layui-textarea"></textarea>
			    </div>
			</div>
		</div>
		<div class="user_right">
			<input type="file" name="dddd" class="layui-upload-file" lay-title="掐指一算，我要换一个头像了">
			<p>由于是纯静态页面，所以只能显示一张随机的图片</p>
			<img src="" class="layui-circle" id="userFace">
		</div>
		<div class="layui-form-item" style="margin-left: 5%;">
		    <div class="layui-input-block">
		    	<button class="layui-btn" lay-submit="" lay-filter="changeUser">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form>
	<script type="text/javascript" src="../../layui/layui.js"></script>
	<script type="text/javascript" src="address.js"></script>
	<script type="text/javascript" src="user1.js"></script>
</body>
</html>