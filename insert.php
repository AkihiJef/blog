<?php

	include("head.html");

	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("blog", $con);

	$id = $_GET['id'];
	$title = $_GET['title'];
	$main = $_GET['main'];

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
		$sql1 = "update articles set title =  '$title' where id = $id";
		$sql2 = "update articles set main =  '$main' where id = $id";
		if (!mysql_query($sql1,$con))  {
			die('Error: ' . mysql_error());
		}
		if (!mysql_query($sql2,$con))  {
			die('Error: ' . mysql_error());
		}
	}
	mysql_close($con);

	echo '发布成功!!
		 <form action="back.php"><input type="submit" value="返回文章列表" ></form>';

	include("tail.html");

?>
