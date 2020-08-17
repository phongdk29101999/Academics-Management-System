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
                <h3>List Students</h3 >
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Students</li>
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
                    <h3 class="card-title">List Students</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-students" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Student Info</th>
                                    <th>College/Branch</th>
                                    <th>Gender</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (count($students)>0) {
                                        foreach ($students as $index => $student) {
                                ?>
                                            <tr>
                                                <td><?= $student->id?></td>
                                                <td>
                                                    <?= "<b>Name: </b>".$student->name?><br>
                                                    <?= "<b>Email: </b>".$student->email?><br>
                                                    <?= "<b>PhoneNo: </b>".$student->phone_no?><br>
                                                    <?= "<b>BG: </b>".$student->blood_group?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-info btn-allot-modal" data-id="<?= $student->id?>" data-toggle="modal" data-target="#mdl-allot-college">Allot College</button>
                                                </td>
                                                <td><?= strtoupper($student->gender)?></td>
                                                <td>
                                                    <?=
                                                        $this->Html->image("/".$student->profile_image, [
                                                            "style" => "width:70px;height:70px;"
                                                        ])
                                                    ?>
                                                </td>
                                                <td>
                                                    <?= $student->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>"?>
                                                </td>
                                                <td>
                                                <form id="frm-delete-student-<?= $student->id?>" action="<?= $this->Url->build('/admin/delete-student/'.$student->id)?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $student->id?>"/>
                                                    </form>
                                                    <a class="btn btn-warning" href="<?= $this->Url->build('/admin/edit-student/'.$student->id, ['fullBase' => true])?>"><i class="fa fa-pencil-alt"></i></a>
                                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-student-<?= $student->id?>').submit() }"><i class="fa fa-trash-alt"></i></a>
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
                                    <th>Student Info</th>
                                    <th>College/Branch</th>
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
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- The Modal -->
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
             
                <form id="frm-allot-college" method="post " action="<?= $this->Url->build('/admin/assign-college-branch', ['fullBase' => true])?>">
                    <input type="hidden" id="student_id" name="student_id" value="">
                    <div class="form-group">
                        <label>Select College:</label>
                        <select name="college_id " id="dd_college" class="form-control">
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
                    <div class="form-grou p">
                        <label>Select Branch:</label>
                        <select name="branch_id" id="dd_branch" class="form-control">
                            <option value="">Choose Branch</option>
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
        "/plugins/datatables-bs4/js/dataTables.bootstrap4.js"
    ],["block" => "bottomScriptLinks"])
?>
<?php
    $this->Html->scriptStart(["block" => true]);
    echo '$("#tbl-students").DataTable();';

    // click event
    echo '$(document).on("click", ".btn-allot-modal", function(){
        var student_id = $(this).attr("data-id");
        $("#student_id").val(student_id);
    });';
    
    //ajax request - on Change
    echo '$(document).on("change", "#dd_college", function(){
        var college_id = $(this).val();
        var postdata = "college_id="+college_id;
        $.get("'.$this->Url->build("/admin/allot-college", ["fullBase" => true]).'", postdata, function(response){
            
            var data = $.parseJSON(response);
            
            if(data.status){
                
                var branchHtml = "";
                
                $.each(data.branches, function(index, item){
                    
                    branchHtml += "<option value=\'"+item.id+"\'>"+item.name+"</option>";
                    
                });
                
                $("#dd_branch").append(branchHtml);
            }
        }); 
    });';
    $this->Html->scriptEnd();
?>