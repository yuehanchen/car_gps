<!DOCTYPE html>
<html lang="en">
<head>
<title>用户登录</title>
<meta charset='utf-8'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
$("#dl").click(function(){
	var user = $("#username").val();
	var pwd = $("#pwd").val();
	$.post("/ci/index.php/user/ajax_check_login", {user:user,pwd:pwd},function(data){
        if(data!=='login'){
		$("#remind").css('display','block');
		$("#remind").html(data);
        }else{
        location.href="/ci";
        }
	}); 
});
})
</script>
</head>
<body>
<div id="remind" style="display:none"></div>
<form action="/CodeIgniter/index.php/login/checklogin" method="post" id="dl_form">
用户名：<input type="text" name="uname" id="username" value=""><br>
密码：<input type="password" name="upass" id="pwd" value=""><br>
<input type="button" name="dl" id="dl" value="登录">
</form>
</body>