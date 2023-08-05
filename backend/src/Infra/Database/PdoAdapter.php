<?php

namespace Src\Infra\Database;

use PDO;

class PdoAdapter implements DatabaseConnectionInterface
{
	private $connection, $query;

	public function __construct()
	{
		$this->connection  = new PDO('mysql:host=localhost;dbname=cccat12', 'root', '1234');
	}
	public function query(string $statement,  $params)
	{
		$this->query = $this->connection->prepare($statement);
		return $this->query->execute($params);
	}
	public function getRow()
	{
		return	$this->query->fetch(PDO::FETCH_OBJ);
	}
	public function close(): void
	{
		$this->connection = null;
	}
}
