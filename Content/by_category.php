<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
<?php
$cateid=$_GET['id'];
require_once "../PHP/db.php";
$cate_info=mysqli_query($db,"SELECT CategoryName FROM category WHERE CategoryID='$cateid'");
while ($row=mysqli_fetch_row($cate_info))
{
	$cate_name=$row[0];
}
echo "<title>$cate_name</title>";
?>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../Resources/CSS/index.css">
		<link rel="stylesheet" type="text/css" href="../Resources/CSS/table.css">
		<script type="text/javascript">    
		function tablecolor(id)
		{
			if(document.getElementsByTagName)
			{ 
				var table = document.getElementById(id); 
				var rows = table.getElementsByTagName("tr");
				for(i=0;i<rows.length;i++)
				{         
					if(i%2==0)
					{
						rows[i].className="evenrowcolor";
					}
					else
					{
						rows[i].className="oddrowcolor";
					}     
				}
			}
		}		
        window.onload=function()
		{
            tablecolor('tablecolor');
        }
		</script>
	</head>
	<body>
		<script type="text/javascript" src="common.js"></script>
		<div class="article">
<?php
echo "<h1><nobr>$cate_name</nobr></h1>";
?>
			<div style="margin: 0px auto; min-height:385px; padding-bottom:60px; text-align: center;">
<?php
$result=mysqli_query($db,"SELECT * FROM books WHERE Category='$cateid' ORDER BY year asc, title asc");
echo '<table id="tablecolor" style="font-size:11px">'."\n";
echo("<tr><th>作者</th><th>书名</th><th>出版社</th><th>年份</th><th>书号</th><th></th><th></th></tr>");
while ($row=mysqli_fetch_row($result))
{
	$count[]=$row[1];
	echo("<tr><td>");
	echo($row[0]);
	echo("</td><td>");
	echo($row[1]);
	echo("</td><td>");
	echo($row[3]);
	echo("</td><td>");
	echo($row[4]);
	echo("</td><td>");
	echo($row[5]);
	echo("</td><td>");
	echo("<div style='white-space:nowrap;'><a href='reference.php?id=$row[7]' target='_blank'><button>引用</button></a></div>");
	echo("</td><td>");
	echo("<div style='white-space:nowrap;'><a href='update.php?id=$row[7]' target='_blank'>修改</a></div>");
	echo("</td></tr>\n");
}
echo ("<th colspan='7' style='text-align:center;'>");
echo "本分类有";
echo (sizeof($count));
echo "本书";
echo ("</th>");
echo "</table>\n";
mysqli_close($db);
?>
			</div>
		</div>
	<script type="text/javascript" src="../Resources/common/footer.js"></script>
	</body>
</html>