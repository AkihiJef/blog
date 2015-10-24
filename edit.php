
<?php
	if($_POST['id'])
	{
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
 		$main = $row['text'];
 		$id = $_POST['id'];
	}
	else
	{
		$title = '';
		$main = '';
		$id = 0;
	}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>edit it</title>
</head>
<body>
<form action="index.php"><input type="submit" value="返回文章列表" ></form>
<form action="delete.php"><input type="hidden"  name="id" value="<?php echo $id; ?>" ><input type="submit" value="删除本篇" ></form>
<fieldset>
	<legend>编辑文章</legend>
	 <form  method="post", action="insert.php">
              	TITLE: <input type="text" size="80" name ="title"  value="<?php echo $title; ?>" required="required" >
             	<input type="submit" value="发布" ></br>
              	<textarea type="text" name="main" style="width:1200px;height:500px;"><?php echo $main; ?></textarea>
              	<input type="hidden"  name="id" value="<?php echo $id; ?>" >
	</form>
</fieldset>

</body>
</html