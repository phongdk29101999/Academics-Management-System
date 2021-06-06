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
    #frm-edit-branch label.error {
        color: red;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Edit Branch</h3 >
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Branch</li>
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
                        <h3 class="card-title">Edit Branch</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?=
                            $this->Form->create($branch, [
                                "id" => "frm-edit-branch",
                            ])
                        ?>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" value="<?= $branch->name?>" name="name" id="name" placeholder="Enter Name" class="form-control" required/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control" name="description" id="description" placeholder="Enter text"><?= $branch->description?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select College*</label>
                                        <select class="form-control" name="college_id" id="college_id" required>
                                            <option value="">Choose College </option>
                                            <?php 
                                                if(count($colleges)>0){
                                                    foreach ($colleges as $index => $college) {
                                            ?>  
                                            <option value="<?= $college->id?>" <?= $branch->college_id == $college->id ? "selected" : ""?>><?= strtoupper($college->name)?></option>
                                            <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Total Seats*</label>
                                        <input type="number" value="<?= $branch->total_seats?>" min="150" placeholder="Total Seats" class="form-control" name="total_seats" id="total_seats" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Session Start Date*</label>
                                        <input type="text" value="<?= $branch->start_date?>" name="start_date" id="start_date" class="form-control" required/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Session End Date*</label>
                                        <input type="text" value="<?= $branch->end_date?>" name="end_date" id="end_date" class="form-control" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Total Durations*</label>
                                        <input type="number" value="<?= $branch->total_durations?>" name="total_durations" min="1" id="total_durations" placeholder="Enter Total Duration" class="form-control" required/>
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Status*</label>
                                        <select class="form-control" name="status" id="status" required>
                                            <option value="1" <?= $branch->status == 1 ? "selected" : ""?>>Active</option>
                                            <option value="0" <?= $branch->status == 0 ? "selected" : ""?>>Inactive</option>
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
    echo '$("#frm-edit-branch").validate();';
    echo 'pickmeup("input#start_date", {hide_on_select: true, position: "bottom"}).set_date("'.$branch->start_date.'");';
    echo 'pickmeup("input#end_date", {hide_on_select: true, position: "bottom"}).set_date("'.$branch->end_date.'");';
    $this->Html->scriptEnd();
?>