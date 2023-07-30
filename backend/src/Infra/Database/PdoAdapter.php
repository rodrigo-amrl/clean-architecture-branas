<?php

namespace Src\Infra\Database;

use PDO;

class PdoAdapter implements DatabaseConnectionInterface
{
	private $connection;

	public function __construct()
	{
		$this->connection  = new PDO('mysql:host=localhost;dbname=cccat12', 'root', '1234');
	}
	public function query(string $statement,  $params)
	{
		$query = $this->connection->prepare($statement);
		return $query->execute($params);
	}
	public function close(): void
	{
		$this->connection = null;
	}
}
