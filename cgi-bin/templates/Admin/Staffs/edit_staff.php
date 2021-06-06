<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }
?>
<?=
    $this->Html->css([
        "pickmeup.css"
    ], ["block" => "TopStyleLinks"])
?>
<style>
    #frm-edit-staff label.error {
        color: red;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Edit Staff</h3 >
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Staff</li>
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
                        <h3 class="card-title">Edit Staff</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?=
                            $this->Form->create($staff, [
                                "id" => "frm-edit-staff",
                                "type" => "file",
                            ])
                        ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input value="<?= $staff->name?>" type="text" name="name" id="name" placeholder="Enter Name" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="text" value="<?= $staff->email?>" name="email" id="email" placeholder="Enter Email" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone No*</label>
                                        <input type="text" value="<?= $staff->phone_no?>" name="phone_no" id="phone_no" placeholder="Enter Phone No" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Address*</label>
                                        <textarea class="form-control" name="address" id="address" placeholder="Enter Address" required><?= $staff->address?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Designation*</label>
                                        <textarea class="form-control" name="designation" id="designation" placeholder="Enter Designation" required><?= $staff->designation?></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Type*</label>
                                        <select class="form-control" name="staff_type" required>
                                            <option value="instructor" <?= $staff->staff_type == "instructor"? "selected" : ""?>>Instructor</option>
                                            <option value="librarian" <?= $staff->staff_type == "librarian"? "selected" : ""?>>Librarian</option>
                                            <option value="lab-instructor" <?= $staff->staff_type == "lab-instructor"? "selected" : ""?>>Lab Instructor</option>
                                            <option value="workshop-instructor" <?= $staff->staff_type == "workshop-instructor"? "selected" : ""?>>Workshop Instructor</option>
                                            <option value="financial-manager" <?= $staff->staff_type == "financial-manager"? "selected" : ""?>>Financial Manager</option>
                                            <option value="head-of-department" <?= $staff->staff_type == "head-of-department"? "selected" : ""?>>Head of Department</option>
                                            <option value="non-technical" <?= $staff->staff_type == "non-technical"? "selected" : ""?>>Non Technical</option>
                                            <option value="others" <?= $staff->staff_type == "others"? "selected" : ""?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Gender*</label>
                                        <select class="form-control" name="gender" id="gender" required>
                                            <option value="male" <?= $staff->gender == "male" ? "selected" : "" ?>>Male</option>
                                            <option value="female" <?= $staff->gender == "female" ? "selected" : "" ?>>Female</option>
                                            <option value="others" <?= $staff->gender == "others" ? "selected" : "" ?>>Others</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Blood Group*</label>
                                        <select class="form-control" name="blood_group" id="blood_group" required>
                                            <option value="A+" <?= $staff->blood_group == "A+" ? "selected" : "" ?>>A+</option>
                                            <option value="A-" <?= $staff->blood_group == "A-" ? "selected" : "" ?>>A-</option>
                                            <option value="B+" <?= $staff->blood_group == "B+" ? "selected" : "" ?>>B+</option>
                                            <option value="B-" <?= $staff->blood_group == "B-" ? "selected" : "" ?>>B-</option>
                                            <option value="O+" <?= $staff->blood_group == "O+" ? "selected" : "" ?>>O+</option>
                                            <option value="O-" <?= $staff->blood_group == "O-" ? "selected" : "" ?>>O-</option>
                                            <option value="AB+" <?= $staff->blood_group == "AB+" ? "selected" : "" ?>>AB+</option>
                                            <option value="AB-" <?= $staff->blood_group == "AB-" ? "selected" : "" ?>>AB-</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Profile Image*</label>
                                        <input type="file" name="profile_image" id="profile_image" class="form-control"/>
                                        <?=
                                            $this->Html->image("/".$staff->profile_image, ["style" => "width:100px;height:100px;"]);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth*</label>
                                        <input type="text" name="dob" id="dob" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="1" <?= $staff->status == 1 ? "selected" : ""?>>Active</option>
                                        <option value="0" <?= $staff->status == 0 ? "selected" : ""?>>Inactive</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                <button name="btn_submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                            </div>
                        <?= $this->Form->end()?>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?=
    $this->Html->script([
        "jquery.validate.min.js",
        "pickmeup.js",
        // "pickmeup.min.js"
    ],["block" => "bottomScriptLinks"])
?>
<?php
    $this->Html->scriptStart(["block" => true]);
    echo '$("#frm-edit-staff").validate();';
    echo 'pickmeup("input#dob", {hide_on_select: true, position: "bottom"}).set_date("'.$staff->dob.'");';
    $this->Html->scriptEnd();
?>