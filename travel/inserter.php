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
	"id"=>time(),
	"bus"=>$bus,
	"to"=>$_POST["to"],
	"company"=>$company,
	"from"=>$_POST["from"],
	"date"=>$_POST["date"],
	"price"=>intval($_POST["price"]),
	"time"=>$_POST["time-hour"].':'.$_POST["time-minute"],
	"capacity"=>["all"=>intval($_POST["capacity"]), "free"=>intval($_POST["capacity"])],
	"customers"=>[]
]);
Message::set('travel created');
header("location:../index.php");
?>