<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Http\Response;
use Cake\Log\Log;

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
        $student = $this->Students->get($id);

        if ($this->request->is(["post", "put", "patch"])) {
            $studentData = $this->request->getData();
            $fileObject = $this->request->getData("profile_image");
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();
            
            if (!empty($filename)) {
                $valib_extensions = array("image/png", "image/jpg", "image/jpeg", "image/gif");
                if (in_array($fileExtension, $valib_extensions)) {
                    $destination = WWW_ROOT."students".DS.$filename;
                    $fileObject->moveTo($destination);
                    $studentData["profile_image"] = "students".DS.$filename;
                } else {
                    $this->Flash->error("Uploaded file is not an image");
                }
            } else {
                $studentData["profile_image"] = $student->profile_image;
            }
            
            $student = $this->Students->patchEntity($student, $studentData);

            if ($this->Students->save($student)) {
                $this->Flash->success("Student has been updated successfully");
                return $this->redirect(["action" => "listStudents"]);
            } else {
                $this->Flash->error("Failed to update Student");
            }
        }

        $this->set(compact("student"));
        $this->set('title', "Edit Student | Academics Management");
    }

    public function deleteStudent($id = null){
        $this->request->allowMethod(["post", "delete"]);

        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success("Student has been deleted successfully");
        } else {
            $this->Flash->error("Fail to delete student");
        }
        return $this->redirect(["action" => "listStudents"]);
    }

    public function getCollegeBranches(){
        $this->autoRender = false;
        $college_id = $this->request->getData("college_id");
        
        $branches = $this->Branches->find()
            ->select([
                "id", 
                "name",
            ])
            ->where([
                "college_id" => $college_id,
            ])
            ->toList();
        return $this->response->withType('vcf')
        ->withStringBody(json_encode([
            "status" => 1,
            "message" => "Branches found",
            "branches" => $branches
        ]));
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

    public function removeAssignedCollegeBranch($id=null){
        $student = $this->Students->get($id);

        $student["branch_id"] = null;
        $student["college_id"] = null;

        if ($this->Students->save($student)) {
            $this->Flash->success("Assigned College/Branch removed successfully");
        } else {
            $this->Flash->error("Failed to remove College/Branch");
        }
        return $this->redirect(["action" => "listStudents"]);
    }
}
?>