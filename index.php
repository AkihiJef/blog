<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>菜鸡部落</title>
<?php
    $con = mysql_connect("localhost","root","finifugal");
    if (!$con)
     {
         die('Could not connect: ' . mysql_error());
     }

    mysql_select_db("blog", $con);

    $sql = "select count(*) from articles";  
    $result = mysql_query($sql, $con);  
    if ($result)  
    {  
        $count = mysql_fetch_row($result);  
    }  
    else  
    {  
        die("query failed");  
    }  
    echo "共有$count[0] 篇文章<br />";  
?>
<form action="edit.php", method="post">
        <input type="submit" value="新文章" >
</form>
 <?php
    $sql = "select * from articles";  
    $result = mysql_query($sql, $con);  
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
    {  
            echo $row['title'] . "--------------发布时间:" . $row['time'] . "   " . $row['id'];
            $str = sprintf('<form action="edit.php", method="post"><input type="hidden"  name="id" value="%d" ><input type="submit" value="修改" > </form>', $row['id']);
            echo $str . "</br>";
    }  
    mysql_free_result($result);  
    mysql_close($con);
?>
