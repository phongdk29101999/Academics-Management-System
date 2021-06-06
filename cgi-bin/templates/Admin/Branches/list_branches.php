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
                <h3>List Branches</h3 >
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Branches</li>
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
                        <h3 class="card-title">List Branches</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-branches" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Branch Info</th>
                                    <th>College Name</th>
                                    <th>Total Seats</th>
                                    <th>Total Durations</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if (count($branches)>0) {
                                        foreach ($branches as $index => $branch) {

                                ?>
                                    <tr>
                                        <th><?=$branch->id?></th>
                                        <th><?= "<b>Name: </b>".$branch->name."<br><b>Session Start Date: </b>".$branch->start_date."<br><b>Session End Date: </b>".$branch->end_date?></th>
                                        <th><?= isset($branch->branch_college->name) ? $branch->branch_college->name : "N/A"?></th>
                                        <th><?= $branch->total_seats?></th>
                                        <th><?= $branch->total_durations?></th>
                                        <th>
                                        <form id="frm-delete-branch-<?= $branch->id?>" action="<?= $this->Url->build('/admin/delete-branch/'.$branch->id)?>" method="post">
                                            <input type="hidden" name="id" value="<?= $branch->id?>"/>
                                        </form>
                                        <a class="btn btn-warning" href="<?= $this->Url->build('/admin/edit-branch/'.$branch->id, ['fullBase' => true])?>"><i class="fa fa-pencil-alt"></i></a>
                                         <a class="btn btn-danger" href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-branch-<?= $branch->id?>').submit() }"><i class="fa fa-trash-alt"></i></a>
                                        </th>
                                    </tr>
                                <?php
                                        }
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Branch Info</th>
                                    <th>College Name</th>
                                    <th>Total Seats</th>
                                    <th>Total Durations</th>
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
        "/plugins/datatables-bs4/js/dataTables.bootstrap4.js"
    ],["block" => "bottomScriptLinks"])
?>
<?php
    $this->Html->scriptStart(["block" => true]);
    echo '$("#tbl-branches").DataTable();';
    $this->Html->scriptEnd();
?>