<?php
    if (!empty($title)){
        $this->assign("title", $title);
    }
    $this->Html->css([
        "/plugins/datatables-bs4/css/dataTables.bootstrap4.css",
        "buttons.dataTables.min.css",
        // "jquery.dataTables.min.css",
    ], ["block" => "TopStyleLinks"]);
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Colleges Report</h3 >
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Colleges Report</li>
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
                        <h3 class="card-title">Colleges Report</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-college-report" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>College Info</th>
                                    <th>Short Name</th>
                                    <th>Cover Image</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (count($colleges)>0)
                                    {
                                        foreach($colleges as $index => $college){
                                ?>
                                            <tr>
                                                <td><?= $college->id?></td>
                                                <td><?= "<b>Name: </b>".$college->name."<br><b>mail: </b>".$college->email."<br><b>PhoneNo: </b>".$college->contact_number ?></td>
                                                <td><?= $college->short_name?></td> 
                                                <td><?= $this->Html->image("/".$college->cover_image, ["style" => "width:70px;height:70px;"])?></td>
                                                <td>
                                                    <?= $college->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>Inactive</button>" ?>
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
                                    <th>College Info</th>
                                    <th>Short Name</th>
                                    <th>Cover Image</th>
                                    <th>Status</th>
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
        // "jquery-3.5.1.js",
        "dataTables.buttons.min.js",
        "jszip.min.js",
        "pdfmake.min.js",
        "vfs_fonts.js",
        "buttons.html5.min.js",
    ],["block" => "bottomScriptLinks"])
?>
<?php
    $this->Html->scriptStart(["block" => true]);
    echo "$('#tbl-college-report').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]});";
    $this->Html->scriptEnd();
?>