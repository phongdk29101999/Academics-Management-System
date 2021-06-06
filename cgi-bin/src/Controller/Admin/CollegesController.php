<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use PhpParser\Node\Expr\Empty_;

class CollegesController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Colleges"); 
        $this->viewBuilder()->setLayout("admin");
    }

    public function addCollege(){
        $college = $this->Colleges->newEmptyEntity();
        if ($this->request->is("post"))
        {
            $fileObject = $this->request->getData("cover_image");
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            $valib_extensions = array("image/png", "image/jpg", "image/jpeg", "image/gif");
            if (in_array($fileExtension, $valib_extensions)){
                $destination = WWW_ROOT."colleges".DS.$filename;
                $fileObject->moveTo($destination);

                $collegeData = $this->request->getData();
                $collegeData['cover_image'] = 'colleges'.DS.$filename;

                $college = $this->Colleges->patchEntity($college, $collegeData);

                if ($this->Colleges->save($college))
                {
                    $this->Flash->success("College has been created successfully");
                    $this->redirect(["action" => "listColleges"]);
                } else {
                    $this->Flash->error("Failed to create College");
                }
            } else {
                $this->Flash->error("Uploaded file is not an image");
            }
        }
        $this->set(compact("college"));
        $this->set('title', "Add College | Academics Management");
    }

    public function listColleges(){
        $colleges = $this->Colleges->find()->toList();
        $this->set(compact("colleges"));
        $this->set('title', "List Colleges | Academics Management");
    }

    public function editCollege($id = null){
        $college = $this->Colleges->get($id, [
            "contain" => [],
        ]);
        if ($this->request->is(["post", "put", "patch"]))
        {
            $collegeData = $this->request->getData();
            $fileObject = $this->request->getData("cover_image");
            $filename = $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();
            if (!empty($filename)){
                $valib_extensions = array("image/png", "image/jpg", "image/jpeg", "image/gif");
                if (in_array($fileExtension, $valib_extensions)){
                    $destination = WWW_ROOT."colleges".DS.$filename;
                    $fileObject->moveTo($destination);

                    
                    $collegeData['cover_image'] = 'colleges'.DS.$filename;

                    
                } else {
                    $this->Flash->error("Uploaded file is not an image");
                }
            } else {
                $collegeData['cover_image'] = $college->cover_image;
            }
            $college = $this->Colleges->patchEntity($college, $collegeData);

            if ($this->Colleges->save($college))
            {
                $this->Flash->success("College has been updated successfully");
                $this->redirect(["action" => "listColleges"]);
            } else {
                $this->Flash->error("Failed to update College");
            }
        }
        $this->set(compact("college"));
        $this->set('title', "Edit College | Academics Management");
    }

    public function deleteCollege($id = null){
        $this->request->allowMethod(["post", "delete"]);

        $college = $this->Colleges->get($id);
        if ($this->Colleges->delete($college)) {
            $this->Flash->success("College has been deleted successfully");
        } else {
            $this->Flash->error("Fail to delete college ");
        }
        return $this->redirect(["action" => "listColleges"]);
    }
}
?>