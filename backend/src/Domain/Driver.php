<?php

namespace Src\Domain;


class Driver
{

	public Email $email;
	public Cpf $document;
	public CarPlate $car_plate;

	public function __construct(
		public readonly string $driver_id,
		public readonly string $name,
		string $email,
		string $document,
		string $car_plate
	) {
		$this->email = new Email($email);
		$this->document = new Cpf($document);
		$this->car_plate = new CarPlate($car_plate);
	}

	public static function  create(
		string $name,
		string $email,
		string $document,
		string $car_plate
	) {
		$driver_id = UUIDGenerator::create();
		return new Driver($driver_id, $name, $email, $document, $car_plate);
	}
}
