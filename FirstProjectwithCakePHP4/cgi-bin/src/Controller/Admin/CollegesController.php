<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class CollegesController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function addCollege(){
        $this->set('title', "Add College | Academics Management");
    }

    public function listColleges(){
        $this->set('title', "List Colleges | Academics Management");
    }

    public function editCollege($id = null){
        $this->set('title', "Edit College | Academics Management");
    }

    public function deleteCollege($id = null){

    }
}
?>