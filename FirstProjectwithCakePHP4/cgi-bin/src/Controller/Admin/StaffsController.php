<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class StaffsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function addStaff(){
        $this->set('title', "Add Staff | Academics Management");
    }

    public function listStaffs(){
        $this->set('title', "List Staffs | Academics Management");
    }
    
    public function editStaff($id = null){
        $this->set('title', "Edit Staff | Academics Management");
    }

    public function deleteStaff($id = null){

    }
}
?>