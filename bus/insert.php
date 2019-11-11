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
		<h2 class="big-title">B</h2>
		<div class="little-title">
			us
		</div>
	</div>
	<form class="form" action="inserter.php" method="POST">
	  <div class="form-group">
	    <label for="Plaque">Plaque</label>
	    <input required="" name="Plaque" type="text" class="form-control" id="Plaque" placeholder="Plaque">
	  </div>
	  <div class="form-group">
	    <label for="driver  first name">Driver first name</label>
	    <input required="" name="driver first name" type="text" class="form-control" id="driver  first name" placeholder="driver  first name">
	  </div>
	  	  <div class="form-group">
	    <label for="driver last name">Driver last name</label>
	    <input required="" name="driver last name" type="text" class="form-control" id="driver last name" placeholder="driver last name">
	  </div>
	  <button type="submit" class="btn btn-warning create-btn">Create</button>
	</form>
	<br>
	<br>
</body>
</html>