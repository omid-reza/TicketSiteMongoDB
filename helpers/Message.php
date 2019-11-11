<?php

namespace Helper;

use Helper\Transfer;

class Message implements Transfer
{
	public static function set($value)
	{
		Session::set('Message', $value);
	}

	public static function get()
	{
		$message=Session::get('Message');
		Session::delete('Message');
		return $message;
	}

	public static function has()
	{
		return Session::isset('Message');
	}
}