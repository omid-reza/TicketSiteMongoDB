<?php

namespace Helper;

class Session
{

	public static function start()
	{
		if (session_status() == PHP_SESSION_NONE)
		    session_start();
	}

	public static function get($key)
	{
		static::start();
		return $_SESSION[$key];
	}

	public static function set($key, $value)
	{
		static::start();
		$_SESSION[$key]=$value;	
	}

	public static function isset($key)
	{
		static::start();
		return isset($_SESSION[$key]);
	}

	public static function delete($key)
	{
		static::start();
		unset($_SESSION[$key]);
	}
}