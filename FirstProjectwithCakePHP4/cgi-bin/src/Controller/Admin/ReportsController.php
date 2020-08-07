<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class ReportsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function collegeReport(){
        $this->set('title', "College Report | Academics Management");
    }

    public function studentReport(){
        $this->set('title', "Student Report | Academics Management");
    }

    public function staffReport(){
        $this->set('title', "Staff Report | Academics Management");
    }
}
?>