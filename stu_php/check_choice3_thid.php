<?php
	$con=mysql_connect('localhost','zuo','151002315');
	$db_selected=mysql_select_db('n152315',$con);
	$studentid=$_GET['studentid'];
	$thid=$_GET['thid3'];
	//把这个学生所在专业的所有题目挑出来创建一个视图
	$SQL="create view possible_thesis3 as select * from thesis where  thesis.major = (select major from student where sid='".$studentid."')";
	mysql_query($SQL);	
$sql1="select * from possible_thesis3 where thid='".$thid."'";
	$result1=mysql_query($sql1);
	$data=mysql_num_rows($result1);
	if($data>0){
		echo "<font color=green>该课题可选</font>";
		$sql2="insert into s_th values('".$studentid."','".$thid."')";
		$result2=mysql_query($sql2);

	}else{
		echo "<font color=red>该课题不属于你所在专业或不存在</font>";
	}
	  $s="drop view possible_thesis3";
        mysql_query($s);
	mysql_close($con);
?>
