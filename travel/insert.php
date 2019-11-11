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
		<h2 class="big-title">T</h2>
		<div class="little-title">
			ravel
		</div>
	</div>
	<form class="form" action="inserter.php" method="POST">
	  <div class="form-group">
	    <label for="from">From</label>
	    <select required class="browser-default custom-select custom-select-lg mb-3" name="from">
		  <option selected value="">Select city</option>
			<?php  require '../helpers/cities.php';?>
		</select>
	  </div>
	  <div class="form-group">
	    <label for="to">To</label>
	    <select required class="browser-default custom-select custom-select-lg mb-3" name="to">
		  <option selected value="">Select city</option>
			<?php  require '../helpers/cities.php';?>
		</select>
	  </div>
	  <div class="form-group">
	    <label for="time">date</label>
	    <input required name="date" type="text" class="form-control" id="time" placeholder="date">
	  </div>
	  <div class="form-group">
	    <label for="time">time</label>
	    <div style="display: flex;">
	    	<select required class="browser-default custom-select custom-select-lg mb-3" name="time-hour">
			  <option selected value="">Hours</option>
				<?php  require '../helpers/hours.php';?>
			</select>
			<select required class="browser-default custom-select custom-select-lg mb-3" name="time-minute">
			  <option selected value="">Minutes</option>
				<?php  require '../helpers/minutes.php';?>
			</select>
	    </div>
	  </div>
	  <div class="form-group">
	    <label for="price">price</label>
	    <input required name="price" type="text" class="form-control" id="price" placeholder="price">
	  </div>
	  <div class="form-group">
	    <label for="capacity">capacity</label>
	    <input required name="capacity" type="text" class="form-control" id="capacity" placeholder="capacity">
	  </div>
		<select required class="browser-default custom-select custom-select-lg mb-3" name="company_id">
			<option selected value="">Select company</option>
			<?php
			  	require '../vendor/autoload.php';
			  	use Mongo\MongoDB;
			  	$companies=MongoDB::connect("companies");
			  	$companies=$companies->find([])->toArray();
			  	foreach ($companies as $company_data): ?>
					<option value="<?= $company_data['id'] ?>"><?= $company_data['name'] ?></option>
				<?php endforeach ?>
		</select>
	  <button type="submit" class="btn btn-warning create-btn">Create</button>
	</form>
	<br>
	<br>
</body>
</html>s