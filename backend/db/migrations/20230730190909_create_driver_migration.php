<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateDriverMigration extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('drivers', ['id' => false, 'primary_key' => ['driver_id']]);
        $table->addColumn('driver_id', 'uuid', ['null' => false])
            ->addColumn('name', 'string', ['limit' => 100])
            ->addColumn('email', 'string', ['limit' => 100])
            ->addColumn('document', 'string', ['limit' => 20])
            ->addColumn('car_plate', 'string', ['limit' => 10])
            ->addColumn('created_a', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
