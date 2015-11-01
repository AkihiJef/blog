<?php

	include("head.html");

	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)  {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("blog", $con);

	$sql = "DELETE  FROM articles  WHERE id =" . $_GET['id'];
	if (!mysql_query($sql,$con))  {
		die('Error: ' . mysql_error());
	}
	mysql_close($con);

	echo '删除成功!!<form action="back.php"><input type="submit" value="返回文章列表" ></form>';
		 
	include("tail.html");

?>
