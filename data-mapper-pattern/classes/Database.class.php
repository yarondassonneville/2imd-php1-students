<?php

class Database {

	private static $db;

	public static function getInstance() {
		if(self::$db != null) {
			return self::$db;
		}
		else {
			$dbh = new PDO('mysql:host=localhost;dbname=php-booking', 'root', '');
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $dbh;
		}
	}
}