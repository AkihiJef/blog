<?php

	include("head.html");

	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)  {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("blog", $con);

	$sql = sprintf("SELECT * FROM articles  WHERE id  = %d",$_GET['id']);
	$result = mysql_query($sql,$con);

	if ($result)  { 
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
	}  
	else  {  
		die("query failed");  
	}  

	$title = $row['title'];
	$main = $row['main'];	
	$id = $row['id'];
	$time = $row['time'];
	$view = $row['view']+1;

	$sql = "UPDATE articles SET view =  '$view' WHERE id = $id";
	if (!mysql_query($sql,$con))  {
		die('Error: ' . mysql_error());
	}
	mysql_close($con);

 	echo '<form action="index.php"><input type="submit" value="返回文章列表" ></form>';

	echo $title . "</br>" . "发布时间:" . $time . "------------------浏览次数:" . $view . "</br>";
	echo "<pre>" . $main . "</pre>" ;

	include("tail.html");

?>