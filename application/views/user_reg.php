<!DOCTYPE html>
<html lang="en">
<head>
<title>用户注册</title>
<meta charset='utf-8'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(function(){
$("#zc").click(function(){
	var user = $("#username").val();
	var pwd = $("#pwd").val();
	$.post("/ci/index.php/user/ajax_check_reg", {user:user,pwd:pwd},function(data){
        if(data!=='submit'){
		$("#remind").css('display','block');
		$("#remind").html(data);
        }else{
        $("#reg_form").submit();
        }
	}); 
});
})
</script>
</head>
<body>
<div id="remind" style="display:none"></div>
<form action="/ci/index.php/user/reg" method="post" name="reg_form" id="reg_form">
用户名：<input type="text" name="username" id="username" value=""><br>
密码：<input type="password" name="pwd" id="pwd" value=""><br>
<input type="button" name="zc" id="zc" value="注册">
</form>
</body>