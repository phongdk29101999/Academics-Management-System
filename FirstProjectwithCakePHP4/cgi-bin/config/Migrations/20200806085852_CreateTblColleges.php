<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTblColleges extends AbstractMigration
{
    public $autoId = false;

    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('tbl_colleges');
        $table->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 5,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 120,
            'null' => false,
        ]);
        $table->addColumn('short_name', 'string', [
            'default' => null,
            'limit' => 50,
            'null' => true,
        ]);
        $table->addColumn('description', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('location', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('total_faculty', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('cover_image', 'string', [
            'default' => null,
            'limit' => 220,
            'null' => true,
        ]);
        $table->addColumn('contact_number', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => true,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 120,
            'null' => true,
        ]);
        $table->addColumn('status', 'integer', [
            'default' => 1,
            'limit' => 5,
            'null' => false,
        ]);
        $table->addColumn('created_at', 'datetime', [
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);
        $table->addPrimaryKey([
            'id',
        ]);
        $table->create();
    }
}
