<?php  session_start();
     if(!isset($_SESSION["isAdminLogedin"]) || $_SESSION["isAdminLogedin"] !=true) {
        header("Location: index.php");
     }?>
<?php include("header.php")?>
<?php include("function-admin.php")?>
<?php $list = get_post_activity_list();?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>View Post Activity Fom List</h1>
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
                            <th>Over All</th>
                            <th>Photo</th>
                            <th>Certificate</th>
                            <th>Proof</th>
                            <th>Media</th>
                            <th>Video</th>
                            <th>Date (yyyy-mm-dd)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i=1;  foreach($list as $addteam): ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $addteam['reg_no'] ?></td>
                                    <td><?= $addteam['name'] ?></td>
                                    <td><?= $addteam['event_name'] ?></td>
                                    <td><?= $addteam['sub_event_name'] ?></td>
                                    <td><?= $addteam['over_all'] ?></td>
                                    <td> <img width="100px"class="img-thumbnail" src="../assets/images/<?= $addteam['photo'] ?>" alt=""> </td>
                                    <td> <img width="100px"class="img-thumbnail" src="../assets/images/certificate/<?= $addteam['certificate'] ?>" alt=""> </td>
                                    <td> <img width="100px"class="img-thumbnail" src="../assets/images/proof/<?= $addteam['proof'] ?>" alt=""> </td>
                                    <td> <img width="100px"class="img-thumbnail" src="../assets/images/proof/<?= $addteam['media'] ?>" alt=""> </td>
                                    <td> <img width="100px"class="img-thumbnail" src="../assets/images/proof/<?= $addteam['video'] ?>" alt=""> </td>
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
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->



<?php include("footer.php")?>