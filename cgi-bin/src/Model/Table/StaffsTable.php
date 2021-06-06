<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class StaffsTable extends Table{
    public function initialize(array $config): void
    {
        $this->setTable("tbl_staffs");
        $this->belongsTo("staffCollege", [
            "className" => "Colleges",
            "foreignKey" => "college_id"
        ]);
        $this->belongsTo("staffBranch", [
            "className" => "Branches",
            "foreignKey" => "branch_id",
        ]);
    }
}
?>