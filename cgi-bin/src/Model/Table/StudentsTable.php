<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class StudentsTable extends Table{
    public function initialize(array $config): void
    {
        $this->setTable("tbl_students");
        $this->belongsTo("studentCollege", [
            "className" => "Colleges",
            "foreignKey" => "college_id",
        ]);
        $this->belongsTo("studentBranch", [
            "className" => "Branches",
            "foreignKey" => "branch_id",
        ]);
    }
}
?>