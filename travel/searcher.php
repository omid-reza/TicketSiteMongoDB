<?php
if (
	(!isset($_POST['from']))||
	(!isset($_POST['to']))||
	(!isset($_POST['date']))
) {
	header('location:search.php');
}
require '../vendor/autoload.php';
use Mongo\MongoDB;
$travels=MongoDB::connect("travels");
$response=$travels->find([
	'from'=> $_POST['from'],
	'to'=>$_POST['to'],
	'date'=>$_POST['date']
])->toArray();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $fromtodate ?></title>
	<link rel="stylesheet" type="text/css" href="../style/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../style/searcherByFromToDate.css">
</head>
<body>
	<br><br><br>
	<?php if (count($response)==0): ?>
		<div class="empty-title">
			<h2>N</h2>
			<div class="empty-little-title">
				o
			</div>
			<h2 class="big-title">T</h2>
			<div class="empty-little-title">
				ravels
			</div>
			<h2 class="big-title">F</h2>
			<div class="empty-little-title">
				ound
			</div>
		</div>
	<?php else: ?>
	<?php foreach ($response as $travel_id => $travel): ?>
		<div class="card w-75">
		  <div class="card-body">
		  	<div class="travel-info">
			    <h5 class="card-title">
			    	<img src="../images/train.svg">
			    	<?= $travel['from'].' - '.$travel['to'] ?>
			    </h5>
			    <data class="card-text">
			    	<img src="../images/time.svg">
			    	<?= $travel['time'] ?>
			    </data>
			    <data class="card-text date">
			    	<img src="../images/date.svg">
			    	<?= $travel['date'] ?>
			    </data>
			    <data class="card-text date">
			    	<img src="../images/money.svg">
			    	<?= $travel['price'].' Tooman' ?>
			    </data>
		    </div>
		  </div>
		</div>
		<br>
	<?php endforeach ?>
	<?php endif ?>
</body>
</html>