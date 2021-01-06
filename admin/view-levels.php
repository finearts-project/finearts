<?php  session_start();
     if(!isset($_SESSION["isAdminLogedin"]) || $_SESSION["isAdminLogedin"] !=true) {
        header("Location: index.php");
     }?>
<?php include("header.php")?>
<?php include("function-admin.php")?>

<?php $list = get_levels();?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Levels List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li> -->
                        <li>Welcome </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->

            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Sno</th>
                            <th>Event Level</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;  foreach($list as $addteam): ?>
                                <tr>
                                    <td><?= $i?></td>
                                    <td><?= $addteam['level'] ?></td>
                                    <td><a href="add-edit.levels.php?edit=<?php echo $addteam['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i>
                                    <a style="color:red" href="javascript:void(0)" onclick="del(<?php echo $addteam['id']?>)"><i class="fa fa-trash" aria-hidden="true"></i></td>
                                </tr>
                            <?php $i+=1; endforeach ?>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->


<script>

function del(id)
{
    $.post("function-admin.php?action=del_level",{del_id : id},function(){
        window.location.reload();
    })
}
</script>
<?php include("footer.php")?>