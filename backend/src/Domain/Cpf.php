<?php

namespace Src\Domain;

use Exception;

class Cpf
{
	public function __construct(protected string $cpf)
	{
		if (!$this->validate()) throw new Exception("Invalid cpf");
	}

	private function validate()
	{
		$this->cpf = $this->clean();
		if ($this->isValidLength()) return false;
		if ($this->hasAllDigitsEqual()) return false;
		$dg1 = $this->calculateDigit(10);
		$dg2 = $this->calculateDigit(11);
		return $this->extractCheckDigit() == $dg1 . $dg2;
	}

	private function clean()
	{
		return preg_replace('/\D/', '', $this->cpf);
	}

	private function isValidLength()
	{
		return strlen($this->cpf) !== 11;
	}

	private function hasAllDigitsEqual()
	{
		$primeiro_digito = $this->cpf[0];
		return array_reduce(str_split($this->cpf), function ($acumulador, $digito) use ($primeiro_digito) {
			return $acumulador && ($digito === $primeiro_digito);
		}, true);
	}

	private  function calculateDigit(int $fator)
	{
		$total = 0;
		for ($i = 0; $i < strlen($this->cpf); $i++) {
			if ($fator > 1) {
				$total += intval($this->cpf[$i]) * $fator--;
			}
		}
		$resto = $total % 11;
		return ($resto < 2) ? 0 : 11 - $resto;
	}

	private function extractCheckDigit()
	{
		return substr($this->cpf, 9);
	}
}
