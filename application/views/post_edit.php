<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>编辑留言</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

</style>
</head>
<body>
<a href="/ci">首页</a><br>
<?php if(isset($msg)&&$msg=='done')echo '<font color=red>修改成功</font>';elseif(isset($msg)&&$msg=='failed')echo '<font color=red>修改失败</font>';?>
<form action="/ci/index.php/post_edit/editpost/<?php echo $post[0]->id;?>" method="post" name="ly">
标题:<input type="text" value="<?php echo $post[0]->title;?>" name="title"><br>
内容:<textarea rows="10" cols="30" name="content"><?php echo $post[0]->content;?></textarea><br>
<input type="submit" name="tj" value="提交">
</form>
</body>
</html>