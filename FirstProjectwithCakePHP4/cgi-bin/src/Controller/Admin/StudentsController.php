<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class StudentsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Students");
        $this->viewBuilder()->setLayout("admin");
    }

    public function addStudent(){
        $student = $this->Students->newEmptyEntity();
        if ($this->request->is('post')) {
            $fileObject = $this->request->getData('profile_image');
            $filename = $fileObject->getClientfilename();
            $fileExtension = $fileObject->getClientMediaType();

            $valid_extension = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $valid_extension)) {
                $destination = WWW_ROOT."students".DS.$filename;
                $fileObject->moveTo($destination);

                $studentData = $this->request->getData();
                $studentData["profile_image"] = "students".DS.$filename;
                $student = $this->Students->patchEntity($student, $studentData);
                if ($this->Students->save($student)) {
                    $this->Flash->success("Student has been created successfully");
                    $this->redirect(["action" => "listStudents"]);
                } else {
                    $this->Flash->error("Failed to create Student");
                }
            } else {
                $this->Flash->error("Uploaded file is not an image");
            }
        }
        $this->set(compact("student"));
        $this->set('title', "Add Student | Academics Management");
    }

    public function listStudents(){
        $students = $this->Students->find()->contain([
            "student_college" => function($q){
                return $q->select(["id", "name"]);
            },
            "student_branch" => function($q){
                return $q->select(["id", "name"]);
            }
        ])->toList();
        $this->set(compact("students"));
        $this->set('title', "List Students | Academics Management");
    }

    public function editStudent($id = null){
        $this->set('title', "Edit Student | Academics Management");
    }

    public function deleteStudent($id = null){

    }
}
?>