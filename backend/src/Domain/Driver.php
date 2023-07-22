<?php

namespace Src\Domain;


class Driver
{

	public Email $email;
	public Cpf $document;
	public CarPlate $carPlate;

	public function __construct(
		public readonly string $driverId,
		public readonly string $name,
		string $email,
		string $document,
		string $carPlate
	) {
		$this->email = new Email($email);
		$this->document = new Cpf($document);
		$this->carPlate = new CarPlate($carPlate);
	}

	public static function  create(
		string $name,
		string $email,
		string $document,
		string $carPlate
	) {
		$driverId = UUIDGenerator::create();
		return new Driver($driverId, $name, $email, $document, $carPlate);
	}
}
