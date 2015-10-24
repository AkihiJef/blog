<?php
	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)
 	 {
 		 die('Could not connect: ' . mysql_error());
 	 }
	mysql_select_db("blog", $con);

	$id = $_POST['id'];
	$title = $_POST['title'];
	$main = $_POST['main'];
	if($id == 0)
	{
		$sql = "INSERT INTO articles (title,text,view)
		VALUES
		('$title','$main',0)";

		if (!mysql_query($sql,$con))
  		{
  			die('Error: ' . mysql_error());
  		}
  	}
  	else
  	{
  		$sql1 = "update articles set title =  '$title' where id = $id";
  		$sql2 = "update articles set text =  '$main' where id = $id";
  		mysql_query($sql1,$con);
  		mysql_query($sql2,$con);
  	}
	mysql_close($con);
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>发布成功</title>
</head>
<body>
	 发布成功!!
	 <form name="form_a" method="post", action="index.php">
            		<input type="submit" value="返回文章列表" >
	</form>
</body>
</html>