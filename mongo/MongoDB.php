<?php
namespace Mongo;

use MongoDB\Client;

class MongoDB
{
	public static function connect($table=null){
		$response=(new Client(
			'mongodb://127.0.0.1'
		))->imdb;
		if ($table)
			$response=$response->$table;
		return $response;
	}
}