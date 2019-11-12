<?php
	require '../vendor/autoload.php';
	use Helper\Session;
	if ( ! Session::isset('username') || ! isset($_GET['id']))
		header('location:../');
	use Mongo\MongoDB;
	$travels=MongoDB::connect("travels");
	$travel=$travels->findOne(['id'=>intval($_GET['id'])]);
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
		<h2>B</h2>
		<div class="little-title">
			uy
		</div>
		<h2 class="big-title">N</h2>
		<div class="little-title">
			ew
		</div>
		<h2 class="big-title">T</h2>
		<div class="little-title">
			icket
		</div>
	</div>
	<form class="form" action="inserter.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $travel['id'];?>">
	  <div class="form-group">
	    <strong>From : </strong>
	    <data><?php echo $travel['from']; ?></data>
	  </div>
	  <div class="form-group">
	    <strong>To :</strong>
	    <data><?php echo $travel['to']; ?></data>
	  </div>
	  <div class="form-group">
	    <strong>Date :</strong>
	    <data><?php echo $travel['date']; ?></data>
	  </div>
	  <div class="form-group">
	    <strong>Time :</strong>
	    <data><?php echo $travel['time']; ?></data>
	  </div>
	  <div class="form-group">
	    <strong>price :</strong>
	    <data><?php echo $travel['price']; ?></data>
	  </div>
	  <div class="form-group">
	    <strong>All Capacity :</strong>
	    <data><?php echo $travel['capacity']['all']; ?></data>
	  </div>
	  <div class="form-group">
	    <strong>Free capacity :</strong>
	    <data><?php echo $travel['capacity']['free']; ?></data>
	  </div>
	  <div class="form-group">
		<strong>Company  Name:</strong>
		<data><?php echo $travel['company']['name']; ?></data>
	</div>
	<div class="form-group">
		<strong>Bus Plaque:</strong>
		<data><?php echo $travel['bus']['Plaque']; ?></data>
	</div>
	  <button type="submit" class="btn btn-warning create-btn" >Buy Ticket</button>
	</form>
</body>
</html>