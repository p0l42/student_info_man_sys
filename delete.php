<?php
	error_reporting(0);
	$conn = mysqli_connect("localhost", "root", "password", "sqltest");
	if(!$conn){
		echo "connect db error"."<br />";
	}
	mysqli_query($conn, "set names utf8");
	$id = $_GET["id"];
	$sql = "delete from student where id=$id";
	mysqli_query($conn, $sql);
	$res = mysqli_affected_rows($conn);
	if($res === 1){
		echo "<script>alert('删除成功')</script>";
	}else{
		echo "不存在该数据或删除失败";
	}
	header("refresh:1; url=index.php");
