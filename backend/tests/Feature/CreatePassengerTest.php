<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Src\Application\UseCases\CreatePassenger\CreatePassengerInput;
use Src\Application\UseCases\CreatePassenger\CreatePassengerUseCase;
use Src\Application\UseCases\GetPassenger\GetPassengerInput;
use Src\Application\UseCases\GetPassenger\GetPassengerUseCase;
use Src\Infra\Database\PdoAdapter;
use Src\Infra\Repository\PassengerRepositoryDatabase;

final class CreatePassengerTest extends TestCase
{
	public function testCadastroPassageiro(): void
	{
		$input = new CreatePassengerInput(
			name: "John Doe",
			email: "jon.doe@tmail.com",
			document: "83432616074"
		);

		$connection = new PdoAdapter();
		$usecase = new CreatePassengerUseCase(new PassengerRepositoryDatabase($connection));
		$output = $usecase->execute($input);

		$this->assertNotNull($output->passenger_id);
	}
	public function testCadastroEmailInvalido(): void
	{

		$input = new CreatePassengerInput(
			name: "John Doe",
			email: "jon.doe@tmail",
			document: "83432616074"
		);

		$connection = new PdoAdapter();
		$usecase = new CreatePassengerUseCase(new PassengerRepositoryDatabase($connection));
		$this->expectExceptionMessage("Invalid email");
		$usecase->execute($input);
	}
	public function testGetPassageiro()
	{
		$input = new CreatePassengerInput(
			name: "John Doe",
			email: "jon.doe@tmail.com",
			document: "83432616074"
		);

		$connection = new PdoAdapter();
		$usecase = new CreatePassengerUseCase(new PassengerRepositoryDatabase($connection));
		$output = $usecase->execute($input);

		$this->assertNotNull($output->passenger_id);

		$usecase = new GetPassengerUseCase(new PassengerRepositoryDatabase($connection));
		$driver = $usecase->execute(new GetPassengerInput($output->passenger_id));

		$this->assertEquals($driver->name, 'John Doe');
	}
}
