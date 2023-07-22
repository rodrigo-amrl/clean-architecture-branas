

<?php

use Src\Domain\Cpf;


test('Deve testar cpf valido', function () {
	$cpf = new Cpf("83432616074");
	expect($cpf)->toBeObject();
});
test('Não deve permitir cpf inválido', function () {
	expect(fn () => new Cpf("99999999999"))->toThrow("Invalid cpf");
});
