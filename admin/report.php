<?php  session_start();
     if(!isset($_SESSION["isAdminLogedin"]) || $_SESSION["isAdminLogedin"] !=true) {
        header("Location: index.php");
     }?>
<?php include("header.php")?>
<?php include("function-admin.php")?>
<?php $list = get_report();?>
<?php if(!empty($list)) {?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Activity Fom List</h1>
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
                                <th>Register Number</th>
                                <th>Student Name</th>
                                <th>Event Name</th>
                                <th>Sub Event</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;  foreach($list as $addteam): ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $addteam['student_reg_no'] ?></td>
                                <td><?= $addteam['student_name'] ?></td>
                                <td><?= $addteam['event_name'] ?></td>
                                <td><?= $addteam['sub_event_name'] ?></td>
                                <td><?= $addteam['from_date'] ?></td>
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
<?php } else {?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Activity Fom List</h1>
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
                <section>
                    <input type="text" class="form-control">
                </section>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sno</th>
                                <th>Register Number</th>
                                <th>Student Name</th>
                                <th>Event Name</th>
                                <th>Sub Event</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;  foreach($list as $addteam): ?>
                            <tr>

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
<?php } ?>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->



<?php include("footer.php")?>