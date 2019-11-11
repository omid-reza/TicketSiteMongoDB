<?php
	use Helper\Session;
	require '..\vendor\autoload.php';
	Session::delete('username');
	header('location:../index.php');
?>