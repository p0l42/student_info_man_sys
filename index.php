<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/static/plugins/bootstrap-3.4.1/css/bootstrap.css">
	<script src="/static/plugins/bootstrap-3.4.1/js/bootstrap.js"></script>
	<title>学生信息管理</title>
</head>
<body>
	<div class="container clearfix">
		<h1>学生信息管理</h1>
		<div class="row">
	      <form action="search.php">
			  <div class="form-group">
			  	<div class="col-xs-5">
			    	<input type="text" class="form-control" id="search" name="keywords">
			    </div>
			    <div class="col-xs-1">
			    	<input type="submit" class="btn btn-primary" name="submit" value="search">
			    </div>
			    <div>
			    	<a class="btn btn-success" href="add.html">add</a>
			   	</div>
			  </div>
		  </form>
      	</div>
		<table class="table" style="margin-top:10px;"> 
	      <tr>
	        <th>id</th>
	        <th>name</th>
	        <th>age</th>
	        <th>class</th>
	        <th>action</th>
	      </tr>
<?php
	error_reporting(0);
	$conn = mysqli_connect("localhost", "root", "password", "sqltest");
	if(!$conn){
		echo "connect db error"."<br />";
	}
	mysqli_query($conn, "set names utf8");
	$sql = "select student.id, student.name, student.age, class.classname from student join class on student.classid=class.id";
	$results = mysqli_query($conn, $sql);
	
	while($row = mysqli_fetch_row($results)){ ?>
		<tr>
<?php
		foreach($row as $key=>$value){ ?>
			<td><?php echo $value;?></td>
		<?php } ?> 
			<td><a href="<?php echo 'modify.php?id='.$row[0];?>">modify | <a href="<?php echo 'delete.php?id='.$row[0];?>">delete</td>
		</tr>
	<?php }

?>
	    </table>
	</div>
</body>
</html>