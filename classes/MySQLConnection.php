<?php

namespace SqlInjection;

class MySQLConnection {
	private $pdo;

	public function connect() {
		if ($this->pdo == null) {
			$this->pdo = new \PDO("mysql:host=" . Config::MYSQL_HOST . ";dbname=" . Config::MYSQL_DATABASE . ";port=" . Config::MYSQL_PORT,  Config::MYSQL_USER, Config::MYSQL_PASSWD );
		}

		return $this->pdo;
	}
}
