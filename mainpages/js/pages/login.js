$(function(){
	$('#entry').click(function(){
			var adminName=document.getElementById("adminName").value;//获取form中的用户名
			var adminPwd=document.getElementById("adminPwd").value;
			var regex=/^[/s]+$/;//声明一个判断用户名前后是否有空格的正则表达式
			if(regex.test(adminName)||adminName.length==0)//判断用户名的是否前后有空格或者用户名是否为空
				{
						alert("用户名格式不对");
						return false;
				}
			if(regex.test(adminPwd)||adminPwd.length==0)//同上述内容
				{
						alert("密码格式不对");
						return false;
				}
			return ture;
	});
});
