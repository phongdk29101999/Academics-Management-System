<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h3>Add College</h3 >
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add College</li>
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
            <h3 class="card-title">Add College </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <form id="frm-add-college">
                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Name*</label>
                    <input type="text" name="name" id="name" placeholder="Enter Name" class="form-control" required/>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Short Name*</label>
                    <input type="text" name="short_name" id="short_name" placeholder="Enter Short Name" class="form-control" required/>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter text"></textarea>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Localtion*</label>
                    <textarea class="form-control" name="location" id="location" placeholder="Enter Location" required></textarea>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Total Faculty*</label>
                    <input type="number" min="10" name="total_faculty" id="total_faculty" placeholder="Enter Total Faculty" class="form-control" required/>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Contact Number*</label>
                    <input type="text" name="contact_number" id="contact_number" placeholder="Enter Contact Number" class="form-control" required/>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Email*</label>
                    <input type="email" name="email" id="email" placeholder="Enter Email" class="form-control" required/>
                    </div>
                </div> 
                <div class="col-sm-6">
                    <div class="form-group">
                    <label>Cover Image*</label>
                    <input type="file" name="cover_image" id="cover_image" class="form-control" required/>
                    </div>
                </div>
                </div>
                <div class="row">
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
        "jquery.validate.min.js"
    ],["block" => "bottomScriptLinks"])
?>
<?php
    $this->Html->scriptStart(["block" => true]);
    echo '$("#frm-add-college").validate();';
    $this->Html->scriptEnd();
?>