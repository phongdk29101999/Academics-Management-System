<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class DashboardsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Colleges");
        $this->loadModel("Students");
        $this->loadModel("Staffs");
        $this->viewBuilder()->setLayout("admin");
    }

    public function index(){
        $collegeQuery = $this->Colleges->find();
        $collegeData = $collegeQuery->select([
            "total_data" => $collegeQuery->func()->count("*"),
        ])->first();
        $collegeCount = $collegeData->total_data;

        $studentQuery = $this->Students->find();
        $studentData = $studentQuery->select([
            "total_data" => $studentQuery->func()->count("*"),
        ])->first();
        $studentCount = $studentData->total_data;

        $staffQuery = $this->Staffs->find();
        $staffData = $staffQuery->select([
            "total_data" => $staffQuery->func()->count("*"),
        ])->first();
        $staffCount = $staffData->total_data;
        $this->set(compact("collegeCount", "studentCount", "staffCount"));
        $this->set('title', "Admin Dashboards | Academics Management");
    }
}
?>