<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../style/search.css">
</head>
<body>
	<div id="app">
		<form class="form" action="searcher.php" method="POST">
			<div class="form-group">
				<label for="from">From</label>
			   	<select required class="browser-default custom-select custom-select-lg mb-3" name="from">
				<option value="" selected>Select city</option>
				<?php  require '../helpers/cities.php';?>
				</select>
			</div>
			<div class="form-group">
			<label for="to">To</label>
			<select required class="browser-default custom-select custom-select-lg mb-3" name="to">
			  <option value="" selected>Select city</option>
				<?php  require '../helpers/cities.php';?>
			</select>
			</div>
		  <div class="form-group">
		    <label for="time">date</label>
		    <input name="date" required type="text" class="form-control" id="time" placeholder="date">
			</div>
			<button type="submit" class="btn btn-warning search-btn">Search</button>
		</form>
	</div>
</body>
</html>