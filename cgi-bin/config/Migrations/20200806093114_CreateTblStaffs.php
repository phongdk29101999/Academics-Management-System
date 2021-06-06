<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateTblStaffs extends AbstractMigration
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
        $table = $this->table('tbl_staffs');
        $table->addColumn('id', 'integer', [
            'autoIncrement' => true,
            'default' => null,
            'limit' => 5,
            'null' => false,
        ]);
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 120,
            'null' => true,
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 30,
            'null' => true,
        ]);
        $table->addColumn('phone_no', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('college_id', 'integer', [
            'default' => null,
            'limit' => 5,
            'null' => true,
        ]);
        $table->addColumn('branch_id', 'integer', [
            'default' => null,
            'limit' => 5,
            'null' => true,
        ]);
        $table->addColumn('designation', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('staff_type', 'enum', [
            'default' => null,
            'null' => false,
            'values' => array(
                'instructor',
                'librarian',
                'lab-instructor',
                'workshop-instructor',
                'financial-manager',
                'head-of-department',
                'non-technical',
                'others',
            ),
        ]);
        $table->addColumn('address', 'text', [
            'default' => null,
            'null' => true,
        ]);
        $table->addColumn('blood_group', 'enum', [
            'default' => null,
            'null' => false,
            'values' => array(
                'A+',
                'A-',
                'B+',
                'B-',
                'O+',
                'O-',
                'AB+',
                'AB-',
            ),
        ]);
        $table->addColumn('gender', 'enum', [
            'default' => null,
            'null' => false,
            'values' => array(
                "male",
                "female",
                "others",
            ),
        ]);
        $table->addColumn('profile_image', 'string', [
            'default' => null,
            'limit' => 220,
            'null' => true,
        ]);
        $table->addColumn('dob', 'string', [
            'default' => null,
            'limit' => 50,
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
