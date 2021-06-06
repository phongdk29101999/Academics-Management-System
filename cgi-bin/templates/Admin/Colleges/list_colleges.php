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
                                                    <form id="frm-delete-college-<?= $college->id?>" action="<?= $this->Url->build('/admin/delete-college/'.$college->id)?>" method="post">
                                                        <input type="hidden" name="id" value="<?= $college->id?>"/>
                                                    </form>
                                                    <a class="btn btn-warning" href="<?= $this->Url->build('/admin/edit-college/'.$college->id, ['fullBase' => true])?>"><i class="fa fa-pencil-alt"></i></a>
                                                    <a class="btn btn-danger" href="javascript:void(0)" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-college-<?= $college->id?>').submit() }"><i class="fa fa-trash-alt"></i></a>
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
    echo '$("#tbl-colleges").DataTable();';
    $this->Html->scriptEnd();
?>