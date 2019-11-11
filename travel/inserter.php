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
	(!isset($_POST['bus_id']))||
	(!isset($_POST['price']))||
	(!isset($_POST['capacity']))
	) {
	header('location:insert.php');
}
$buses=MongoDB::connect("buses");
$travels=MongoDB::connect("travels");
$companies=MongoDB::connect("companies");
$bus=$buses->findOne(['id'=>$_POST['bus']]);
$company=$companies->findOne(['id'=>$_POST['company_id']]);
$travels->insertOne([
	"bus"=>$bus,
	"to"=>$_POST["to"],
	"company"=>$company,
	"from"=>$_POST["from"],
	"date"=>$_POST["date"],
	"price"=>$_POST["price"],
	"capacity"=>$_POST["capacity"],
	"time"=>$_POST["time-hour"].':'.$_POST["time-minute"]
]);
Message::set('travel created');
header("location:../index.php");
?>