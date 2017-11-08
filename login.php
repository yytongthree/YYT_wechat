<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
	<title>登录界面</title>
	<!-- 引入 WeUI -->
	<link rel="stylesheet" href="dist/style/weui.css"/>
	<link rel="stylesheet" href="dist/example/example.css"/>
	</head>
<body ontouchstart="">
    	<div class="weui-toptips weui-toptips_warn js_tooltips">错误提示</div>
	<form action="enter.php" method="get" >
		<div class="weui-cells weui-cells_form">
   			<div class="weui-cell">
        		<div class="weui-cell__hd"><label class="weui-label">用户账号</label></div>
        		<div class="weui-cell__bd">
            		<input class="weui-input" type="text" placeholder="用户账号..." name="adminName"/>
        		</div>
    		</div>
    		<div class="weui-cell weui-cell_form">
        		<div class="weui-cell__hd">
            		<label class="weui-label">用户密码</label>
        		</div>
        		<div class="weui-cell__bd">
            		<input class="weui-input" type="password" placeholder="用户密码..." name="adminPwd"/>
        		</div>
    		</div>
		</div>
	<div class="weui-cells__tips">欢迎来到医养通系统</div>

<div class="weui-btn-area">
    <button class="weui-btn weui-btn_primary" id="showTooltips">确定</button>
</div>
      </form>
	<script src="dist/example/example.js"></script>
	<script src="dist/example/zepto.min.js"></script>
    </body>
</html>