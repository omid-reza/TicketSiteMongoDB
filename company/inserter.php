<?php
require '../vendor/autoload.php';

use Mongo\MongoDB;
use Helper\Message;
if (!isset($_POST['name'])) {
	header('location:insert.php');
}
$companies=MongoDB::connect("companies");
$companies->insertOne(['id'=>time, 'name'=>$_POST['name']]);
Message::set('Company created');
header("location:../index.php");