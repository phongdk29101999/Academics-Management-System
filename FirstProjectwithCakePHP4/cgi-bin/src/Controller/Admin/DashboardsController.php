<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class DashboardsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
    }

    public function index(){
        $this->set('title', "Admin Dashboards | Academics Management");

    }
}
?>