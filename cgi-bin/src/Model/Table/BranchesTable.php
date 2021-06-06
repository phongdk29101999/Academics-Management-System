<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class BranchesTable extends Table{
    public function initialize(array $config): void
    {
        $this->setTable('tbl_branches');
        $this->belongsTo("branch_college", [
            "className" => "Colleges"
        ])->setForeignKey("college_id");
    }
}
?>