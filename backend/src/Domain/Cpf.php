<?php

namespace Src\Domain;

use Exception;

class Cpf
{
	public function __construct(public string $value)
	{
		if (!$this->validate()) throw new Exception("Invalid cpf");
	}

	private function validate()
	{
		$this->value = $this->clean();
		if ($this->isValidLength()) return false;
		if ($this->hasAllDigitsEqual()) return false;
		$dg1 = $this->calculateDigit(10);
		$dg2 = $this->calculateDigit(11);
		return $this->extractCheckDigit() == $dg1 . $dg2;
	}

	private function clean()
	{
		return preg_replace('/\D/', '', $this->value);
	}

	private function isValidLength()
	{
		return strlen($this->value) !== 11;
	}

	private function hasAllDigitsEqual()
	{
		$primeiro_digito = $this->value[0];
		return array_reduce(str_split($this->value), function ($acumulador, $digito) use ($primeiro_digito) {
			return $acumulador && ($digito === $primeiro_digito);
		}, true);
	}

	private  function calculateDigit(int $fator)
	{
		$total = 0;
		for ($i = 0; $i < strlen($this->value); $i++) {
			if ($fator > 1) {
				$total += intval($this->value[$i]) * $fator--;
			}
		}
		$resto = $total % 11;
		return ($resto < 2) ? 0 : 11 - $resto;
	}

	private function extractCheckDigit()
	{
		return substr($this->value, 9);
	}
}
