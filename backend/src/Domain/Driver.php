<?php

namespace Src\Domain;


class Driver
{

	public function __construct(
		readonly string $driverId,
		readonly string $name,
		Email $email,
		Cpf $document,
		CarPlate $carPlate
	) {
	}

	public static function  create(
		string $name,
		Email $email,
		Cpf $document,
		CarPlate $carPlate
	) {
		$driverId = UUIDGenerator::create();
		return new Driver($driverId, $name, $email, $document, $carPlate);
	}
}
