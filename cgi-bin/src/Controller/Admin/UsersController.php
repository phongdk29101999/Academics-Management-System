<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class UsersController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Users"); 
        $this->viewBuilder()->setLayout("user");
    }

    public function login() {
        $user_id = $this->Auth->user("id");
        if (!empty($user_id)) {
            return $this->redirect("/admin");
        } else {
            if ($this->request->is("post")) {
                $userData = $this->Auth->identify(); 
                if ($userData) {
                    $this->Auth->setUser($userData);
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error("Invalid login details");
                }
            }
        }
        $this->set("title", "AcademicsManagement | Log in");
    }

    public function logout() {
        $this->Flash->success("Logged out successfully");
        return $this->redirect($this->Auth->logout());
    }
}
?>