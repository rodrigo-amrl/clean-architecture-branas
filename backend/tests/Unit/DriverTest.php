<?php

use Src\Domain\Driver;

test("Deve criar um motorista", function () {
	$driver = Driver::create("John Doe", "john.doe@gmail.com", "83432616074", "AAA9999");
	expect($driver->driverId)->toBeString();
	expect($driver->name)->toBe("John Doe");
	expect($driver->email->value)->toBe("john.doe@gmail.com");
	expect($driver->document->value)->toBe("83432616074");
	expect($driver->carPlate->value)->toBe("AAA9999");
});

test("Não pode criar motorista com cpf inválido", function () {
	expect(fn () => Driver::create("John Doe", "john.doe@gmail.com", "83432616076", "AAA9999"))->toThrow("Invalid cpf");
});

test("Não pode criar motorista com email inválido", function () {
	expect(fn () => Driver::create("John Doe", "john.doe@gmail", "83432616074", "AAA9999"))->toThrow("Invalid email");
});

test("Não pode criar motorista com place do carro inválida", function () {
	expect(fn () => Driver::create("John Doe", "john.doe@gmail.com", "83432616074", "AAA999"))->toThrow("Invalid car plate");
});
