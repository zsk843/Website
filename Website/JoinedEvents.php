<!DOCTYPE HTML>
<html>
<head>
<title>个人主页</title>
<meta charset="UTF-8">
<link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />

<?php



?>




</head>
<body>
	<header>
    	<div class="wrap">
            <div class="logo">
                <a href="index.html"><span style="font-size:40px; ">大学生活动社交平台</span></a>
            </div>
            <p>&nbsp;&nbsp;&nbsp;</p>
            <div class="login">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;你好 注销</div> 
            <div class="menu">
            </div>
            <div class="clearFloat"></div>
         </div>
    </header>
    <div class="wrap">
        <div class="one sidebar">
            <div class="widget">
                <ul>
                    <li><a href="index.html" class="icon">个人主页</a></li>
                    <li><a href="CreateEvents.html" class="icon">活动发起</a></li>
                    <li><a href="JoinEvents.html" class="icon">活动参与</a></li>
                    <li class="active"><a href="JoinedEvents.html" class="icon">已参加活动</a></li>
                    <li><a href="UserInfo.html" class="icon">个人信息</a></li>
                </ul>
            </div>
        </div>
        
        <div class="content">
        <div class="grids">
        <h2></h2>
                <div class="grid">
              		<table width="450" bordercolor="#000000" border="5">
                    <tr>
                    <td>活动标题</td>
                    <td>活动时间</td>
                    <td>活动地点</td>
                  </tr>
                  </table>
                  </div>
					<?php
					$con = mysql_connect("127.0.0.1","root","");
					if (!$con)
 					 {
 						 echo "数据库连接错误！";
 					 }
					mysql_select_db("Activity", $con);

					mysql_query("set names 'UTF8'");

  
					$res = mysql_query("select aname, atime, aposition acreater from Activities, ACT_USER where UID = '1' and Activities.AID = ACT_USER.AID",$con);
					
					while($row = mysql_fetch_array($res))
					{
					print "<div class=\"grids\">";
					print "<div class=\"grid\">";
					print "<table width=\"450\" border=\"10\" bgcolor=\"#33FFCC\">";
					print "<tr><td>{$row[0]}</td><td>{$row[1]}</td><td>{$row[2]}</td></tr>";
					print "<tr><td> </td></tr>";
					print "<tr><td><input type=\"button\" value=\"退出活动\" \\></td>";
					
					if(strcmp($res["acreater"],"1"))
					{
						print "<td><input type=\"button\" value=\"结束招募\" \\></td>";
					}
					
					
					print "</tr>";
					print "</table></div></div>";
					}
					?>
                <div class="clearFloat"></div>
            </div>              
</body>
</html>
