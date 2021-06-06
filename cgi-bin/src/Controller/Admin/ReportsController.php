<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class ReportsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Colleges");
        $this->loadModel("Students");
        $this->loadModel("Staffs");
        $this->viewBuilder()->setLayout("admin");
    }

    public function collegeReport(){
        $colleges = $this->Colleges->find()->toList();
        $this->set(compact("colleges"));
        $this->set('title', "College Report | Academics Management");
    }

    public function studentReport(){
        $students = $this->Students->find()->contain([
            "studentCollege" => function($q){
                return $q->select(["id", "name"]);
            },
            "studentBranch" => function($q){
                return $q->select(["id", "name"]);
            }
        ])->toList();
        
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $this->set(compact("students"));
        $this->set('title', "Student Report | Academics Management");
    }

    public function staffReport(){
        $staffs = $this->Staffs->find()->contain([
            "staffCollege" => function($q){
                return $q->select(["id", "name"]);
            },
            "staffBranch" => function($q){
                return $q->select(["id", "name"]);
            },
        ])->toList();
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $this->set(compact("staffs"));
        $this->set('title', "Staff Report | Academics Management");
    }
}
?>