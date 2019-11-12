<?php
require '../vendor/autoload.php';
use Mongo\MongoDB;
use Helper\Session;
if ((!isset($_POST['id']) || (!Session::isset('username'))))
		header('location:../../');
$users=MongoDB::connect('users');
$travels=MongoDB::connect('travels');
$user=$users->findOne(['username'=>Session::get('username')]);
$travel=$travels->findOne(['id'=>intval($_POST['id'])]);
$customers=$travel['customers']->bsonSerialize();
array_push($customers, $user);
if ($travel['capacity']['free']>0)
$travels->updateOne(['id'=>intval($_POST['id'])], ['$set' => ['customers'=>$customers]]);
