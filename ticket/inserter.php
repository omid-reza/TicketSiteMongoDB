<?php
require '../vendor/autoload.php';
use Helper\Error;
use Helper\Message;
use Helper\Session;
use Mongo\MongoDB;
if ((!isset($_POST['id']) || (!Session::isset('username'))))
		header('location:../../');
$users=MongoDB::connect('users');
$travels=MongoDB::connect('travels');
$user=$users->findOne(['username'=>Session::get('username')]);
$travel=$travels->findOne(['id'=>intval($_POST['id'])]);
$customers=$travel['customers']->bsonSerialize();
array_push($customers, $user);
if ($travel['capacity']['free']>0){
	$travels->updateOne(
		['id'=>intval($_POST['id'])],
		['$set' => [
			'capacity'=>[
				'all'=> $travel['capacity']['all'],
				'free'=>$travel['capacity']['free']-1
			],
			'customers'=>$customers
			]
		]);
	Message::set('Your ticket saved');
	header('location:../../');
	return;
}
Error::set('Travel Tickets sold out');
header('location:../../');