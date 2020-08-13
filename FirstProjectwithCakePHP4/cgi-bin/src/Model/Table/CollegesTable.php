<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class CollegesTable extends Table {
    public function initialize(array $config): void
    {
        $this->setTable('tbl_colleges');
    }
}