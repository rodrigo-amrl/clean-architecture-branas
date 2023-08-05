<?php

namespace Src\Domain;

class Passenger
{

	public Email $email;
	public Cpf $document;

	public function __construct(
		public  readonly string $passenger_id,
		public readonly string $name,
		string $email,
		string $document
	) {
		$this->email = new Email($email);
		$this->document = new Cpf($document);
	}

	public static function create(string $name, string $email, string $document)
	{
		$passenger_id = uniqid();
		return new Passenger($passenger_id, $name, $email, $document);
	}
}
