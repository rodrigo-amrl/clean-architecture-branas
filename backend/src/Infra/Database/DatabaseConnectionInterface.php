<?php

namespace Src\Infra\database;

interface DatabaseConnectionInterface
{
	public function query(string $statement, $params);
	public function getRow();
	public function close(): void;
}
