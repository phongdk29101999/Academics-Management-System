<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class StudentsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function addStudent(){
        $this->set('title', "Add Student | Academics Management");
    }

    public function listStudents(){
        $this->set('title', "List Students | Academics Management");
    }

    public function editStudent($id = null){
        $this->set('title', "Edit Student | Academics Management");
    }

    public function deleteStudent($id = null){

    }
}
?>