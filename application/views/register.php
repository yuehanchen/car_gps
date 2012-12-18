<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<center>
<h1>注册用户</h1>
</center>
<?php 

?>
<form action="/GPS_web/index.php/register/insert" method="post">
<ul>
<li>用户名称<input name="u_name" type="text"/>&nbsp*</li>
<li>用户账号<input name="uname" type="text" />&nbsp*</li>
<li>密码&nbsp&nbsp<input name="upass" type="text" />&nbsp*</li>
<li>密码确认<input name="u_upass" type="text" />&nbsp*</li>
<li>类型
<input name="sel_but" type="radio" value="用户" checked />用户
<input name="sel_but" type="radio" value="租赁" />租赁
<input name="sel_but" type="radio" value="物流" />物流
<input name="sel_but" type="radio" value="经销商" />经销商
</li>
<li><input name="sub" type="submit" value="注册" /></li>
</ul>
</form>

<form action="/GPS_web/index.php/register/delete" method="post">
<ul>
<li>用户名称<input name="id" type="text"/></li>
<li><input name="sub" type="submit" value="删除" /></li>
</ul>
</form>
</html>
