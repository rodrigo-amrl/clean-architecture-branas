<?php

use Src\Domain\Email;

test("Deve validar o email", function () {
	$email = new Email("john.doe@gmail.com");
	expect($email)->toBeTruthy();
});

test("Não deve validar um email inválido", function () {
	$email = "john.doe@gmail";
	expect(fn () => new Email($email))->toThrow("Invalid email");
});
