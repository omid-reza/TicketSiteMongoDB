<?php
namespace Helper;

use Helper\Session;
use Helper\Transfer;

class Error implements Transfer
{
	public static function set($value)
	{
		Session::set('Error', $value);
	}

	public static function get()
	{
		
		$message=Session::get('Error');
		Session::delete('Error');
		return $message;
	}

	public static function has()
	{
		return Session::isset('Error');
	}
}