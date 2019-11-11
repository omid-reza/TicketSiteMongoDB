<?php

require '../vendor/autoload.php';

use Helper\Message;
use Mongo\MongoDB;
if (
	(!isset($_POST['Plaque']))||
	(!isset($_POST['driver_first_name']))||
	(!isset($_POST['driver_last_name']))
	) {
	header('location:insert.php');
}

$buses=MongoDB::connect("buses");
$buses->insertOne([
	'Plaque'=>$_POST['Plaque'],
	'driver'=>[
		'first name'=>$_POST['driver_first_name'],
		'last name'=>$_POST['driver_last_name']
	]
]);
Message::set('bus created');
header("location:../index.php");