<?php

	include("head.html");

	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)  {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("blog", $con);

	$id = $_POST['id'];
	$title = $_POST['title'];
	$main = $_POST['main'];

	if($id == 0)  {
		$time = date("y-m-d H:i:s",time());

		$sql = "INSERT INTO articles (title,main,view,time)
		VALUES
		('$title','$main',0,'$time')";
		if (!mysql_query($sql,$con))  {
			die('Error: ' . mysql_error());
		}
	}
	else  {
		$sql = "UPDATE articles SET title =  '$title',main =  '$main' WHERE id = $id";
		if (!mysql_query($sql,$con))  {
			die('Error: ' . mysql_error());
		}
	}
	mysql_close($con);

	echo '发布成功!!
		 <form action="back.php"><input type="submit" value="返回文章列表" ></form>';

	include("tail.html");

?>
