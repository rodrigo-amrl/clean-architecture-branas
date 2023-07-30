<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreatePassengerMigration extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('passengers', ['id' => false, 'primary_key' => ['passenger_id']]);
        $table->addColumn('passenger_id', 'uuid', ['null' => false])
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('document', 'string', ['limit' => 20])
            ->addColumn('created_a', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
