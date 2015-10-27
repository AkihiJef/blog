<?php

	include("head.html");

	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("blog", $con);

	$sql = sprintf("SELECT * FROM articles  WHERE id  = %d",$_POST['id']);
	$result = mysql_query($sql,$con);
	$row = mysql_fetch_array($result, MYSQL_ASSOC);

	$title = $row['title'];
	$main = $row['main'];	
	$id = $_POST['id'];
	$time = $row['time'];
	$view = $row['view']+1;

	$sql = "update articles set view =  '$view' where id = $id";
	mysql_query($sql,$con);
	mysql_close($con);

 ?>

 <form action="index.php"><input type="submit" value="返回文章列表" ></form>

 <?php

	echo $title . "</br>" . "发布时间:" . $time . "------------------浏览次数:" . $view . "</br>";
	echo "<pre>" . $main . "</pre>" ;

	include("tail.html");

?>