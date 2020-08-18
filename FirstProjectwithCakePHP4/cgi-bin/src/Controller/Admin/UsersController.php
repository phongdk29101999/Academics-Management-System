<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class UsersController extends AppController{
    public function initialize(): void
    {
        $this->loadModel("Users"); 
        parent::initialize();
    }

    public function login() {

        $this->autoRender = false;
        
        print("<h1>This is login page</h1>");
    }

    public function dashboard() {
        $this->autoRender = false;
        echo "<h1>This is login page</h1>";
    }

    public function logout() {
        
    }
}
?>