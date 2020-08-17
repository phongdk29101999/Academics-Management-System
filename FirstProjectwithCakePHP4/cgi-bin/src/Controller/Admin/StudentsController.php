<?php
namespace App\Controller\Admin;
use App\Controller\AppController;

class StudentsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Students");
        $this->loadModel("Colleges");
        $this->loadModel("Branches");
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
            "studentCollege" => function($q){
                return $q->select(["id", "name"]);
            },
            "studentBranch" => function($q){
                return $q->select(["id", "name"]);
            }
        ])->toList();
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $this->set(compact("students", "colleges"));
        $this->set('title', "List Students | Academics Management");
    }

    public function editStudent($id = null){
        $this->set('title', "Edit Student | Academics Management");
    }

    public function deleteStudent($id = null){

    }

    public function getCollegeBranches(){
        $this->autoRender = false;
        $college_id = $this->request->getQuery("college_id");
        $branches = $this->Branches->find()
            ->select([
                "id", 
                "name",
            ])
            ->where([
                "college_id" => $college_id,
            ])
            ->toList();
        echo json_encode(array(
            "status" => 1,
            "message" => "Branches found",
            "branches" => $branches, 
        ));
    }

    public function assignCollegeBranch(){
        if ($this->request->is("post")) {
            $student_id = $this->request->getData("student_id");
            $student = $this->Students->get($student_id, [
                "contain" => [],
            ]);
            $studentData = $this->request->getData();
            $student = $this->Students->patchEntity($student, $studentData);

            if ($this->Students->save($student))
            {
                $this->Flash->success("College Branch assigned successfully to student");
            } else {
                $this->Flash->error("Failed to assign to college/branch");
            }
            return $this->redirect(["action" => "listStudents"]); 
        }
    }
}
?>