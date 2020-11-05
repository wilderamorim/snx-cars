<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Categories extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('categories', ['signed' => false]);

        $table->addColumn('title', 'string')
            ->addColumn('slug', 'string')
            ->addColumn('description', 'text', ['null' => true])
            ->addColumn('type', 'char', ['default' => 'product'])
            ->addTimestamps()
            ->addIndex('slug', ['unique' => true])
            ->save();
    }

    public function down()
    {
        $this->table('categories')->drop()->save();
    }
}
