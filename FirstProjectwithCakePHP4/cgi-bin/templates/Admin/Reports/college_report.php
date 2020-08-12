<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }
    $this->Html->css([
        "/plugins/datatables-bs4/css/dataTables.bootstrap4.css",
        "/css/buttons.dataTables.min.css",
    ], ["block" => "TopStyleLinks"]);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h3>List Colleges</h3 >
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">List Colleges</li>
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
            <h3 class="card-title">List Colleges</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tbl-colleges" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>College Info</th>
                    <th>Short Name</th>
                    <th>Cover Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                    <th>#ID</th>
                    <th>College Info</th>
                    <th>Short Name</th>
                    <th>Cover Image</th>
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
<?=
    $this->Html->script([
        "/plugins/datatables/jquery.dataTables.js",
        "/plugins/datatables-bs4/js/dataTables.bootstrap4.js",
        "/js/buttons.html5.min.js",
        "/js/dataTables.buttons.min.js",
        "/js/jszip.min.js",
        "/js/pdfmake.min.js",
        "/js/vfs_fonts.js",
    ],["block" => "bottomScriptLinks"])
?>
<?php
    $this->Html->scriptStart(["block" => true]);
    echo "$('#tbl-colleges').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]});";
    $this->Html->scriptEnd();
?>