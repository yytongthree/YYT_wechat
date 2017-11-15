<!doctype html> 
<?php    session_start();//登录系统开启一个session内容?>
<html> 
<head> 
  <meta charset="UTF-8"> 
  <title>登录系统的后台执行过程</title> 
</head> 
<body> 
<?php
    $username=$_REQUEST["adminName"];//获取html中的用户名（通过post请求） 
    $password=$_REQUEST["adminPwd"];//获取html中的密码（通过post请求） 

	$conn=mysqli_connect("localhost","root","wenny673","yyt_info"); 
	// 检查连接 
	if (!$conn) 
	{ 
    	die("连接错误: " . mysqli_connect_error()); 
	} 
    
    $dbusername=null; 
    $dbpassword=null; 
	$dbauthority=null;
    $result=mysqli_query($conn,"select * from register_info where name ='{$username}'");//查出对应用户名的信息
    while ($row=mysqli_fetch_array($result)) {//while循环将$result中的结果找出来 
      $dbusername=$row["name"]; 
      $dbpassword=$row["password"]; 
	  $dbauthority=$row["authority"];
    } 
    if (is_null($dbusername)) {//用户名在数据库中不存在时跳回index.html界面 
  ?> 
  <script type="text/javascript"> 
    alert("用户名不存在"); 
    window.location.href="login.php"; 
  </script> 
<?php 
    } 
    else { 
      if ($dbpassword!=$password){//当对应密码不对时跳回login.html界面 
  ?> 
  <script type="text/javascript"> 
    alert("密码错误"); 
    window.location.href="login.php"; 
  </script> 
 <?php 
      } 
      else { 
        $_SESSION['username']=$username; 
        $_SESSION['code']=mt_rand(0, 100000);//给session附一个随机值，防止用户直接通过调用界面访问index.php
		switch($dbauthority)
		{
			case "1":{ 
  ?> 
  				<script type="text/javascript"> 
				window.location.href="mainpages/index1.php";
  				</script> 
  <?php 
  			break;
  			}
			case "2":{
?> 
  				<script type="text/javascript"> 
				window.location.href="mainpages/index2.php";
  				</script> 
  <?php 
  			break;
  			}
			case "3":{
?> 
  				<script type="text/javascript"> 
				window.location.href="mainpages/index3.php";
  				</script> 
  <?php 
  			break;
  			}
		}
      } 
    }
   $conn->close();//关闭数据库连接，如不关闭，下次连接时会出错 
   ?>
   	<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
</body> 
</html> 
