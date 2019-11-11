<?php

namespace Helper;

/*
* Message And Error InterFace
*/

interface Transfer{
	public static function get();
	public static function has();
	public static function set($value);
}