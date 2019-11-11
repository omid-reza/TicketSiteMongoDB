<?php

	use Helper\Error;
	use Helper\Message;
	require '../vendor/autoload.php';
	if ((!isset($_POST['username'])) || (!isset($_POST['password'])) || (!isset($_POST['email']))) {
		header('location:signup.php');
	}
	use Mongo\MongoDB;
	$users=MongoDB::connect('users');
	$user_count=$users->count(['username'=>$_POST['username']]);
	if ($user_count==1) {
		Error::set('username exists');
		header('location:signup.php');
		return;
	}
	$users->insertOne([
		'username'=>$_POST['username'],
		'email'=>$_POST['email'],
		'password'=>$_POST['password']
	]);
	Message::set('user registered');
	header('location:../index.php');
?>