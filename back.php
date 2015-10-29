<?php

	include("head.html");

	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)  {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("blog", $con);

	$sql = "select count(*) from articles";  
	$result = mysql_query($sql, $con);  

	if ($result)  {  
		$count = mysql_fetch_row($result);  
	}  
	else  {  
		die("query failed");  
	}  

?>

<form action="index.php"><input type="submit" value="展示文章" ></form>
<form action="edit.php"><input type="submit" value="新文章" ></form>

<?php
	echo "共有 $count[0] 篇文章<br /><br />";  

	$sql = "select * from articles";  
	$result = mysql_query($sql, $con);  

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))  {  
		echo '<a href="edit.php?id=' . $row['id'] . '">' . $row['title']  . '</a>';
		echo "--------------发布时间:" . $row['time'] . "--------浏览次数:" . $row['view'] . "</br>";
		$part_of_article = mb_substr($row['main'], 0, 50, 'utf-8');
		echo $part_of_article . '......</br>';
	}  

	mysql_close($con);

	include("tail.html")

?>
