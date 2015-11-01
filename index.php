<?php

	include("head.html");

	$con = mysql_connect("localhost","root","finifugal");
	if (!$con)  {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("blog", $con);

	$sql = "SELECT COUNT(*) FROM articles";  
	$result = mysql_query($sql, $con);  

	if ($result)  {  
		$count = mysql_fetch_row($result);  
	}  
	else  {  
		die("query failed");  
	}  

	echo '<form action="back.php"><input type="submit" value="管理文章" ></form>';

	echo "共有 $count[0] 篇文章<br /><br />";  
	$lenth = 5;
	$flag = $_GET['page'] * $lenth;
	$sql = "SELECT * FROM articles LIMIT $flag, $lenth";
	$result = mysql_query($sql, $con);  

	while ($row = mysql_fetch_array($result, MYSQL_ASSOC))  {  
		echo '<a href="article.php?id=' . $row['id'] . '">' . $row['title'] . '</a>';
		echo "--------------发布时间:" . $row['time'] . "--------浏览次数:" . $row['view'] . "</br>";
		$part_of_article = mb_substr($row['main'], 0, 50, 'utf-8');
		echo $part_of_article . '......</br>';
	}  

	for ($i=0; $i < $count[0] / $lenth; $i++) { 
		$t = $i + 1;
		if($i != $_GET['page'])echo '<a href="index.php?page=' . $i . '"> ' . $t . ' </a>';
		else echo $_GET['page']+1;
	}

	mysql_close($con);

	include("tail.html");

?>
