$(function(){
	$('#zc').click(function(){
	  var username=document.getElementById("username").value; 
      var password=document.getElementById("password").value; 
      var assertpassword=document.getElementById("assertpassword").value;
	  var truename=document.getElementById("truename").value;
	  var tel=document.getElementById("tel").value;
      var regex=/^[/s]+$/; 
        
      if(regex.test(username)||username.length==0){ 
        alert("用户名格式不对"); 
        return false; 
      } 
      if(regex.test(password)||password.length==0){ 
        alert("密码格式不对"); 
        return false;     
      } 
      if(password!=assertpassword){ 
        alert("两次密码不一致"); 
        return false; 
      }
	  if(regex.test(truename)||truename.length==0){ 
        alert("真实姓名格式不对"); 
        return false;     
      }
	  if(regex.test(password)||password.length==0){ 
        alert("密码格式不对"); 
        return false;     
      }
	  if(regex.test(tel)||tel.length==0){ 
        alert("电话格式不对"); 
        return false;     
      }
	});
});
