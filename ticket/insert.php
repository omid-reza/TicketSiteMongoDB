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
	    From : <?php echo $travel['from']; ?>
	  </div>
	  <div class="form-group">
	    To : <?php echo $travel['to']; ?>
	  </div>
	  <div class="form-group">
	    Date : <?php echo $travel['date']; ?>
	  </div>
	  <div class="form-group">
	    Time : <?php echo $travel['time']; ?>
	  </div>
	  <div class="form-group">
	    price : <?php echo $travel['price']; ?>
	  </div>
	  <div class="form-group">
	    All Capacity : <?php echo $travel['capacity']['all']; ?>
	  </div>
	  <div class="form-group">
	    Free capacity : <?php echo $travel['capacity']['free']; ?>
	  </div>
	  <div class="form-group">
		Company  Name: <?php echo $travel['company']['name']; ?>
	</div>
	<div class="form-group">
		Bus Plaque: <?php echo $travel['bus']['Plaque']; ?>
	</div>
	  <button type="submit" class="btn btn-warning create-btn" >Buy Ticket</button>
	</form>
</body>
</html>