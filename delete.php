<?php

	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)
 	{
 		die('Could not connect: ' . mysql_error());
 	}
 	mysql_select_db("blog", $con);

 	$sql = sprintf("DELETE * FROM articles  WHERE id  = %d",$_POST['id']);
 	mysql_query($sql, $con);
 	mysql_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>删除成功</title>
</head>
<body>
	 删除成功!!
	 <form name="form_a" method="post", action="index.php">
            		<input type="submit" value="返回文章列表" >
	</form>
</body>
</html>