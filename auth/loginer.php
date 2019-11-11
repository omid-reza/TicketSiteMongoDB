<?php
require '../vendor/autoload.php';

use Helper\Error;
use Mongo\MongoDB;
use Helper\Message;
use Helper\Session;

if ((!isset($_POST['username'])) || (!isset($_POST['password']))) {
	header('location:login.php');
}
$users=MongoDB::connect("users");
$user=$users->findOne(["username"=>$_POST['username'], "password"=>$_POST['password']]);
if (count($user)==0) {
	Error::set('invalid username or password');
	header('location:login.php');
	return;
}
Session::set('username', $user['username']);
Message::set('loged in');
header('location:../index.php');
?>