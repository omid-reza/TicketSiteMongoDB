<?php
namespace Helper;

class Counter
{
	public static function calculate($cursor){
		return count(iterator_to_array($cursor));
	}
}