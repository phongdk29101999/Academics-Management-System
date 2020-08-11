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
        <h3>List College</h3 >
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List College</li>
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
            <h3 class="card-title">List College </h3>
            </div>
            <!-- /.card-header -->
  
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