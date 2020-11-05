<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Cars extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('cars', ['signed' => false]);

        $table->addColumn('brand_id', 'integer', ['signed' => false])
            ->addColumn('model_id', 'integer', ['signed' => false])
            ->addColumn('year', 'char', ['limit' => 4])
            ->addColumn('price', 'decimal', ['precision' => 11, 'scale' => 2])
            ->addColumn('city', 'string')
            ->addColumn('description', 'string', ['null' => true])
            ->addColumn('content', 'text', ['null' => true])
            ->addTimestamps()
            ->addForeignKey('brand_id', 'categories', 'id', ['delete' => 'CASCADE', 'update' => 'RESTRICT'])
            ->addForeignKey('model_id', 'categories', 'id', ['delete' => 'CASCADE', 'update' => 'RESTRICT'])
            ->save();
    }

    public function down()
    {
        $this->table('cars')->drop()->save();
    }
}
