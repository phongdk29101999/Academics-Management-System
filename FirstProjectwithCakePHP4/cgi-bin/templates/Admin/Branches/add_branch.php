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

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h3>Add Branch</h3 >
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Branch</li>
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
            <h3 class="card-title">Add Branch</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form id="frm-add-branch">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name*</label>
                            <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" required/>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description" placeholder="Enter text"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Select College*</label>
                            <select class="form-control" name="college_id" id="college_id" required>
                                <option value="1">Sample College </option>
                            </select>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Total Seats*</label>
                            <input type="number" min="150" placeholder="Total Seats" class="form-control" name="total_seats" id="total_seats" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Session Start Date*</label>
                            <input type="date" name="start_date" id="start_date" class="form-control" required/>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Session End Date*</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" required/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Total Durations*</label>
                            <input type="number" name="total_durations" min="1" id="total_durations" placeholder="Enter Total Duration" class="form-control" required/>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                        <label>Status*</label>
                        <select class="form-control" name="status" id="status" required>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
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
            </form>
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
        // "pickmeup.js",
        // "pickmeup.min.js"
    ],["block" => "bottomScriptLinks"])
?>
<?php
    $this->Html->scriptStart(["block" => true]);
    echo '$("#frm-add-branch").validate();';
    // echo 'pickmeup("input#start_date", {hide_on_select: true, position: "right"});';
    // echo 'pickmeup("input#end_date", {hide_on_select: true, position: "right"});';
    $this->Html->scriptEnd();
?>