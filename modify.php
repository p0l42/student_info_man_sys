<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/static/plugins/bootstrap-3.4.1/css/bootstrap.css">
	<script src="/static/plugins/bootstrap-3.4.1/js/bootstrap.js"></script>
	<title>修改信息</title>
</head>
<body>
<?php 
	error_reporting(0);
	$conn = mysqli_connect("localhost", "root", "password", "sqltest");
	if(!$conn){
		echo "connect db error"."<br />";
	}
	mysqli_query($conn, "set names utf8");
	$id = $_GET['id'];
	$sql = "select * from student where id=$id";
	$res = mysqli_query($conn, $sql);
	$rows = mysqli_fetch_assoc($res);
?>
	<div class="container clearfix">
		<h1>修改信息</h1>
		<form method="POST" action="modify.php">
		  <input type="hidden" class="form-control" name="id" value="<?php echo $rows['id'];?>">
		  <div class="form-group">
		    <b>name</b><input type="text" class="form-control" name="name" value="<?php echo $rows['name'];?>">
		  </div>
		  <div class="form-group">
		    <b>age</b><input type="text" class="form-control" name="age" value="<?php echo $rows['age'];?>">
		  </div>
		  <div class="form-group">
		    <b>class</b>
		    <select name="class" class="form-control">
		    	<?php
		    		if($rows['classid'] == 1){
		    			echo '
		    				<option value="1" selected>1</option>
					    	<option value="2">2</option>
					    	<option value="3">3</option>
		    			';
		    		}else if($rows['classid'] == 2){
		    			echo '
		    				<option value="1">1</option>
					    	<option value="2" selected>2</option>
					    	<option value="3">3</option>
		    			';
		    		}else{
		    			echo '
		    				<option value="1">1</option>
					    	<option value="2">2</option>
					    	<option value="3" selected>3</option>
		    			';
		    		}
		    	?>
		    </select>
		  </div>
		  <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
		</form>
	</div>
</body>
</html>

<?php
	if(isset($_POST['submit'])){
		$uid = $_POST['id'];
		$uname = $_POST['name'];
		$uage = $_POST['age'];
		$uclassid = $_POST['class'];
		$sql2 = "update student set name='$uname',age=$uage,classid=$uclassid where id=$uid";
		mysqli_query($conn, $sql2);
		$res = mysqli_affected_rows($conn);
		if($res === 1){
			echo "<script>alert('修改成功')</script>";
		}else{
			echo "修改失败或不存在数据";
		}
		header("refresh:1;url=index.php");
	}
?>