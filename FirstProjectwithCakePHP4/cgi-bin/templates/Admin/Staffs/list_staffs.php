<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }
    $this->Html->css([
        "/plugins/datatables-bs4/css/dataTables.bootstrap4.css",
    ], ["block" => "TopStyleLinks"]);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>List Staffs</h3 >
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Staffs</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content"> 
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">  
                <!-- general form elements disabled -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">List Staffs</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-staffs" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Staff Info</th>
                                    <th>College/Branch</th>
                                    <th>Designation</th>
                                    <th>Gender</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (count($staffs)>0) {
                                        foreach ($staffs as $index => $staff) {
                                            
                                ?>
                                <tr>
                                    <td><?=$staff->id?></td>
                                    <td>
                                        <?php
                                            echo "<b>Name: </b>".$staff->name;
                                            echo "<br>";
                                            echo "<b>Email: </b>".$staff->email;
                                            echo "<br>";
                                            echo "<b>PhoneNo: </b>".$staff->phone_no;
                                            echo "<br>";
                                            echo "<b>Blood Group: </b>".$staff->blood_group;
                                            echo "<br>";
                                            echo "<b>Staff Type: </b>".$staff->staff_type;
                                            echo "<br>";
                                            echo "<b>Designation: </b>".$staff->designation;
                                            echo "<br>";
                                        ?>
                                    </td>
                                    <td>
                                        <?php 
                                            if (isset($staff->staff_college->name) && isset($staff->staff_branch->name)) {
                                                echo "<b>College: </b>".$staff->staff_college->name;
                                                echo "<br>";
                                                echo "<b>Branch: </b>".$staff->staff_branch->name;
                                                echo"<br>";
                                        ?>
                                        <form action="<?= $this->Url->build('/admin/remove-assigned-college-staff/'.$staff->id, ['fullBase' => true])?>" method="post" id="frm-remove-allot-<?= $staff->id?>">
                                                <input type="hidden" name="staff_id" value="<?= $staff->id?>">
                                        </form>
                                        <a href="javascript:void(0)" class="btn-allot-modal" data-id="<?= $staff->id?>" data-toggle="modal" data-target="#mdl-allot-college">Change</a> | 
                                            <a href="javascript:void(0)" onclick="if(confirm('Are you sure want to remove?')){ $('#frm-remove-allot-<?= $staff->id?>').submit() }" class="link-remove-college-branch" >Remove</a>
                                        <?php
                                            } else {
                                        ?>
                                        <button class="btn btn-info btn-allot-modal" data-id="<?= $staff->id?>" data-toggle="modal" data-target="#mdl-allot-college">Allot College</button>
                                        <?php            
                                            }
                                        ?>
                                    </td>
                                    <td><?= $staff->designation?></td>
                                    <td><?= strtoupper($staff->gender)?></td>
                                    <td>
                                        <?= 
                                            $this->Html->image("/".$staff->profile_image, [
                                                "style" => "width:70px;height:70px;",
                                            ])
                                        ?>
                                    </td>
                                    <td>
                                        <?= $staff->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>" ?>
                                    </td>
                                    <td>
                                        <form id="frm-delete-staff-<?= $staff->id?>" action="<?= $this->Url->build('/admin/delete-staff/'.$staff->id)?>" method="post">
                                            <input type="hidden" name="id" value="<?= $staff->id?>"/>
                                        </form>
                                        <a class="btn btn-warning" href="<?= $this->Url->build('/admin/edit-staff/'.$staff->id, ['fullBase' => true])?>"><i class="fa fa-pencil-alt"></i></a>
                                        <a class="btn btn-danger" href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-staff-<?= $staff->id?>').submit() }"><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Staff Info</th>
                                    <th>College/Branch</th>
                                    <th>Designation</th>
                                    <th>Gender</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<div class="modal" id="mdl-allot-college">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Assign College/Branch</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
             
                <form id="frm-allot-college" method="post" action="<?= $this->Url->build('/admin/assign-college-branch-staff', ['fullBase' => true])?>">
                    <input type="hidden" id="staff_id" name="staff_id" value="">
                    <div class="form-group">
                        <label>Select College:</label>
                        <select name="college_id" id="dd_college" class="form-control">
                            <option value="">Choose College</option>
                            <?php
                                if (count($colleges)>0) {
                                    foreach ($colleges as $index => $college) {
                            ?>
                                <option value="<?= $college->id?>"><?= $college->name?></option>
                            <?php            
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Select Branch:</label>
                        <select name="branch_id" id="dd_branch" class="form-control">
                            <option value="">Choose Branch</option>
                            <?php
                                
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div> 
        </div>
    </div>
</div>
<!--/.model-->
<?=
    $this->Html->script([
        "/plugins/datatables/jquery.dataTables.js",
        "/plugins/datatables-bs4/js/dataTables.bootstrap4.js",
        "/js/staffs.js",
    ],["block" => "bottomScriptLinks"])
?>