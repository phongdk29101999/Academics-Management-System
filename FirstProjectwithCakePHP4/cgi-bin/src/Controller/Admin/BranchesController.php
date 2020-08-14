<?php
namespace App\Controller\Admin;
use App\Controller\AppController;
use PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\ForLoopWithTestFunctionCallSniff;

class BranchesController extends AppController{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel('Branches');
        $this->loadModel('Colleges');
        $this->viewBuilder()->setLayout("admin");
    }

    public function addBranch(){
        $branch = $this->Branches->newEmptyEntity();
        if ($this->request->is('post')) {
            $branchData = $this->request->getData();
            $branch = $this->Branches->patchEntity($branch, $branchData);

            if ($this->Branches->save($branch))
            {
                $this->Flash->success("Branch has been created successfully");
                return $this->redirect(["action" => "listBranches"]);
            } else {
                $this->Flash->error("Failed to create Branch"); 
            }
        }
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        
        $this->set(compact('branch', 'colleges'));
        $this->set('title', "Add Branch | Academics Management");
    }

    public function listBranches(){
        $branches = $this->Branches->find()
            ->select([
                "id", 
                "name",
                "college_id",
                "start_date",
                "end_date",
                "total_seats",
                "total_durations",
                "branch_college.name",
            ])
            ->contain(["branch_college"])
            ->toList();
        $this->set(compact('branches'));
        $this->set('title', "List Branches | Academics Management");
    }

    public function editBranch($id = null){
        $branch = $this->Branches->get($id, [
            "contain" => []
        ]);
        if ($this->request->is(['post', 'put', 'patch'])) {
            $branchData = $this->request->getData();
            $branch = $this->Branches->patchEntity($branch, $branchData);

            if ($this->Branches->save($branch))
            {
                $this->Flash->success("Branch has been updated successfully");
                return $this->redirect(["action" => "listBranches"]);
            } else {
                $this->Flash->error("Failed to update Branch"); 
            }
        }
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $this->set(compact("branch", "colleges"));
        $this->set('title', "Edit Branch | Academics Management");
    }

    public function deleteBranch($id = null){
        $this->request->allowMethod(['post', 'delete']);

        $branch = $this->Branches->get($id);
        if ($this->Branches->delete($branch)) {
            $this->Flash->success("Branch has been deleted successfully");
        } else {
            $this->Flash->error("Failed to delete  Branch"); 
        }
        return $this->redirect(["action" => "listBranches"]);
    }
}
?>