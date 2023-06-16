<?php
	// error_reporting(0);
	$conn = mysqli_connect("localhost", "root", "password", "sqltest");
	if(!$conn){
		echo "connect db error"."<br />";
	}
	mysqli_query($conn, "set names utf8");
	$uname = $_POST['name'];
	$uage = $_POST['age'];
	$uclassid = $_POST['class'];
	$sql = "insert into student (name, age, classid) values('$uname',$uage,$uclassid)";
	mysqli_query($conn, $sql);
	$res = mysqli_affected_rows($conn);
	if($res === 1){
		echo "<script>alert('添加成功')</script>";
	}else{
		echo mysqli_error($conn);
		echo "添加失败";
	}
	header("refresh:1; url=index.php");
