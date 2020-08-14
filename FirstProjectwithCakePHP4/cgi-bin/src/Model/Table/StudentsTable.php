<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class StudentsTable extends Table{
    public function initialize(array $config): void
    {
        $this->setTable("tbl_students");
        $this->belongsTo("student_college", [
            "classname" => "Colleges",
            "foreignKey" => "college_id",
        ]);
        $this->belongsTo("student_branch", [
            "classname" => "Branches",
            "foreignKey" => "branch_id",
        ]);
    }
}
?>