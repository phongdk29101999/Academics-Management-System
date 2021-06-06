<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }
?>
<style>
    #frm-edit-college label.error {
        color: red;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h3>Edit College</h3 >
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Edit College</li>
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
                    <h3 class="card-title">Edit College </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?=
                            $this->Form->create($college, [
                                "id" => "frm-edit-college",
                                "type" => "file",
                            ])
                        ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input type="text" value="<?= $college->name?>" name="name" id="name" placeholder="Enter Name" class="form-control" required/>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Short Name*</label>
                                    <input type="text" value="<?= $college->short_name?>" name="short_name" id="short_name" placeholder="Enter Short Name" class="form-control" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Enter text"><?=$college->description?></textarea>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Location*</label>
                                    <textarea class="form-control" name="location" id="location" placeholder="Enter Location" required><?=$college->location?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Total Faculty*</label>
                                    <input type="number" min="10" value="<?=$college->total_faculty?>" name="total_faculty" id="total_faculty" placeholder="Enter Total Faculty" class="form-control" required/>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Contact Number*</label>
                                    <input type="text" value="<?=$college->contact_number?>" name="contact_number" id="contact_number" placeholder="Enter Contact Number" class="form-control" required/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input type="email" value="<?=$college->email?>" name="email" id="email" placeholder="Enter Email" class="form-control" required/>
                                </div>
                            </div> 
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Cover Image*</label>
                                    <input type="file" name="cover_image" id="cover_image" class="form-control"/>
                                    <br>
                                    <?=
                                        $this->Html->image("/".$college->cover_image, ["style" => "width:100px;height:100px;"])
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Status*</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option <?= $college->status == 1 ? "selected" : ""?> value="1">Active</option>
                                        <option <?= $college->status == 0 ? "selected" : ""?> value="0">Inactive</option>
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
                        <?= $this->Form->end();?>
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
        "jquery.validate.min.js"
    ],["block" => "bottomScriptLinks"])
?>
<?php
    $this->Html->scriptStart(["block" => true]);
    echo '$("#frm-edit-college").validate();';
    $this->Html->scriptEnd();
?>