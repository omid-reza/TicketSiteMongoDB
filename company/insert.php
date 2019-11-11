<?php
	require '../vendor/autoload.php';
	use Helper\Session;
	if ( ! Session::isset('username'))
		header('location:../');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Travel</title>
	<link rel="stylesheet" type="text/css" href="../style/insert.css">
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
</head>
<body>
	<div class="title">
		<h2>C</h2>
		<div class="little-title">
			reate
		</div>
		<h2 class="big-title">N</h2>
		<div class="little-title">
			ew
		</div>
		<h2 class="big-title">C</h2>
		<div class="little-title">
			ompany
		</div>
	</div>
	<form class="form" action="inserter.php" method="POST">
	  <div class="form-group">
	    <label for="name">Name</label>
	    <input required="" name="name" type="text" class="form-control" id="name" placeholder="Name">
	  </div>
	  <button type="submit" class="btn btn-warning create-btn">Create</button>
	</form>
	<br>
	<br>
</body>
</html>