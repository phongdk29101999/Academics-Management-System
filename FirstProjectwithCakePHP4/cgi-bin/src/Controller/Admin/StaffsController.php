<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Command\PluginLoadCommand;

class StaffsController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Staffs");
        $this->loadModel("Branches");
        $this->loadModel("Colleges");
        $this->viewBuilder()->setLayout("admin");
    }

    public function addStaff(){
        $staff = $this->Staffs->newEmptyEntity();
        if ($this->request->is("post")) {
            $fileObject = $this->request->getData("profile_image");
            $filename = $fileObject->getClientfilename();
            $fileExtension = $fileObject->getClientMediaType();
            
            $valid_extensions = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $valid_extensions)) {
                $destination = WWW_ROOT."staffs".DS.$filename;
                $fileObject->moveTo($destination);
                $staffData = $this->request->getData();
                $staffData["profile_image"] = "staffs".DS.$filename;
                $staff = $this->Staffs->patchEntity($staff, $staffData);
                if ($this->Staffs->save($staff)) {
                    $this->Flash->success("Staff has been created successfully");
                    return $this->redirect(["action" => "listStaffs"]);
                } else {
                    $this->Flash->error("Failed to create staff");
                }
            } else {
                $this->Flash->error("Uploaded file is not an image");
            }
        }
        $this->set(compact("staff"));
        $this->set('title', "Add Staff | Academics Management");
    }

    public function listStaffs(){
        $staffs = $this->Staffs->find()->contain([
            "staffCollege" => function($q){
                return $q->select(["id", "name"]);
            },
            "staffBranch" => function($q){
                return $q->select(["id", "name"]);
            },
        ])->toList();
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $this->set(compact("staffs", "colleges"));
        $this->set('title', "List Staffs | Academics Management");
    }
    
    public function editStaff($id = null){
        $staff = $this->Staffs->get($id);

        if ($this->request->is(["post", "put", "patch"])) {
            $staffData = $this->request->getData();
            $fileObject = $this->request->getData("profile_image");
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();
            
            if (!empty($filename)) {
                $valib_extensions = array("image/png", "image/jpg", "image/jpeg", "image/gif");
                if (in_array($fileExtension, $valib_extensions)) {
                    $destination = WWW_ROOT."staffs".DS.$filename;
                    $fileObject->moveTo($destination);
                    $staffData["profile_image"] = "staffs".DS.$filename;
                } else {
                    $this->Flash->error("Uploaded file is not an image");
                }
            } else {
                $staffData["profile_image"] = $staff->profile_image;
            }
            
            $staff = $this->Staffs->patchEntity($staff, $staffData);

            if ($this->Staffs->save($staff)) {
                $this->Flash->success("Staff has been updated successfully");
                return $this->redirect(["action" => "listStaffs"]);
            } else {
                $this->Flash->error("Failed to update Staff");
            }
        }

        $this->set(compact("staff"));
        $this->set('title', "Edit Staff | StaffAcademics Management");
    }

    public function deleteStaff($id = null){
        $this->request->allowMethod(["post", "delete"]);

        $staff = $this->Staffs->get($id);
        if ($this->Staffs->delete($staff)) {
            $this->Flash->success("Staff has been deleted successfully");
        } else {
            $this->Flash->error("Fail to delete staff");
        }
        return $this->redirect(["action" => "listStaffs"]);
    }

    public function assignCollegeBranch(){
        if ($this->request->is("post")) {
            $staff_id = $this->request->getData("staff_id");
            $staff = $this->Staffs->get($staff_id, [
                "contain" => [],
            ]);
            
            $staffData = $this->request->getData();
            $staff = $this->Staffs->patchEntity($staff, $staffData);

            if ($this->Staffs->save($staff))
            {
                $this->Flash->success("College Branch assigned successfully to staff");
            } else {
                $this->Flash->error("Failed to assign to college/branch");
            }
            return $this->redirect(["action" => "listStaffs"]); 
        }
    }

    public function removeAssignedCollegeBranch($id=null){
        $staff = $this->Staffs->get($id);

        $staff["branch_id"] = null;
        $staff["college_id"] = null;

        if ($this->Staffs->save($staff)) {
            $this->Flash->success("Assigned College/Branch removed successfully");
        } else {
            $this->Flash->error("Failed to remove College/Branch");
        }
        return $this->redirect(["action" => "listStaffs"]);
    }
}
?>