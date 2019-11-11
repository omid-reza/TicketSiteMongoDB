<?php

require '../vendor/autoload.php';

use Helper\Message;
use Mongo\MongoDB;
if (
	(!isset($_POST['from']))||
	(!isset($_POST['to']))||
	(!isset($_POST['time-hour']))||
	(!isset($_POST['time-minute']))||
	(!isset($_POST['date']))||
	(!isset($_POST['company_id']))||
	(!isset($_POST['price']))||
	(!isset($_POST['capacity']))
	) {
	header('location:insert.php');
}
$travels=MongoDB::connect("travels");

$travels->insertOne([
	"to"=>$_POST["to"],
	"from"=>$_POST["from"],
	"date"=>$_POST["date"],
	"time"=>$_POST["time-hour"].':'.$_POST["time-minute"],
	"price"=>$_POST["price"],
	"capacity"=>$_POST["capacity"]
]);

Message::set('travel created');
header("location:../index.php");
?>