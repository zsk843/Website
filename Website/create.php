<!doctype html>
<html>
<meta charset="UTF-8">

<?php


$aname =  $_POST["aname"];
$atime = $_POST["atime"];
$tags =  $_POST["tags"];
$aposition = $_POST["aposition"];
$ainfo = $_POST["ainfo"];
$amaxnum = $_POST["amaxnum"];

$con = mysql_connect("127.0.0.1","root","");
if (!$con)
  {
  echo "数据库连接错误！";
  }
  
mysql_select_db("Activity", $con);

mysql_query("set names 'UTF8'");

mysql_query("INSERT INTO Activities (aname, aposition, ainfo, amaxnum, atime) 
VALUES ('$aname', '$aposition', '$ainfo', '$amaxnum', '$atime');");

$result = mysql_query("select LAST_INSERT_ID() as aid;");

$row = mysql_fetch_array($result);

$aid = $row['aid'];

$tagset = explode(" ",$tags);

foreach ($tagset as $value)
{
	$TagRes = mysql_query(" select tid from tags where tname = '$value'",$con);
	
	
	
	if(mysql_num_rows($TagRes)==0)
	{
		mysql_query("insert into tags(tname) values('$value');");
		
		$NewTag = mysql_query("select @@IDENTITY as tid");
	}
	
	else
	{
		$NewTag= mysql_query("select tid from tags where tname ='$value'");
	}
	
	$row = mysql_fetch_array($NewTag);
	$tid = $row["tid"];
	
	mysql_query(" insert into ACT_TAG(aid,tid) values('$aid','$tid')");
	
}






?>
</html>