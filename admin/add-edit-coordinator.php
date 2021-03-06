<?php  session_start();
     if(!isset($_SESSION["isAdminLogedin"]) || $_SESSION["isAdminLogedin"] !=true) {
        header("Location: index.php");
     }?>

<?php include("header.php")?>
<?php include("function-admin.php")?>
<?php
 extract($GLOBALS);
    if($_REQUEST['edit']){
        $id = $_REQUEST['edit'];
        $query = "SELECT * FROM `coordinators` WHERE `id` = $id";
        $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        //$reg = $arr[0]['coordinator_reg_no'];
        $reg = '';
        $cor_name = $arr[0]['name'];
        $desg = $arr[0]['designation'];
        $desp = $arr[0]['department'];
        $shift = $arr[0]['shift'];
    }

   if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $id = $_POST['coor_id'];
    //$regno = $_POST['reg'];
    $regno = "";
    $name = $_POST['name'];
    $desg = $_POST['designation'];
    $desc = $_POST['department'];
    $shift = $_POST['shift'];
    if($id){
        $query = "UPDATE `coordinators` SET 
        `name` = '$name', 
        `designation` = '$desg',
        `department` = '$desc',
        `shift` = '$shift'
        WHERE 
        `id` = $id";
         $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    }
    else {
        //$regno = $_POST['reg'];
        $regno = '';
        $name = $_POST['name'];
        $desg = $_POST['designation'];
        $desc = $_POST['department'];
        $shift = $_POST['shift'];
        $date = date("yy-m-d");
        $query = "INSERT INTO `coordinators` (`coordinator_reg_no`, `name`, `designation`, `department`,`shift`,`delete_status`, `create_date`)
        VALUES ( ' $regno', ' $name', ' $desg','$desc','$shift', 'N', '$date');";
        $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
        
    }
    header("Location: view-coordinators.php");
  } 

  
function check_null($value)
{
    if(!empty($value))
    {
        return $value;
    }
    else{
        return '';
    }
}

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Coordinators</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li> -->
                        <li>Welcome</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-primary">
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" role="form" method="post" action="add-edit-coordinator.php" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    <input type="hidden" name="coor_id" value="<?php echo  check_null($arr[0]["id"])?>">
                    <div class="card-body">
                        <!-- <div class="form-group">
                            <label for="exampleInputPassword1">Coordinator Reg No</label>
                            <input type="text" class="form-control" value="<?php echo check_null($reg)?>" id="reg"
                                name="reg" required placeholder="Enter RegNo">
                        </div> -->
                        <div class="form-group">
                            <label for="exampleInputPassword1">Coordinator Name</label>
                            <input type="text" class="form-control" value="<?php echo check_null($cor_name)?>" id="name"
                                name="name" required placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Designation</label>
                            <input type="text" class="form-control" value="<?php echo  check_null($desg)?>"
                                id="designation" name="designation" placeholder="Enter designation" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Department</label>
                            <input type="text" class="form-control" value="<?php echo  check_null($desp)?>"
                                id="department" name="department" placeholder="Enter department" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Shift</label>
                            <select name="shift" id="shift" class="form-control" required>
                                <option value="">[Select]</option>
                                <option value="Day" <?php echo $shift == 'Day' ? 'selected':''?>>Day</option>
                                <option value="Evening" <?php echo $shift == 'Evening' ? 'selected':''?>>Evening</option>
                            </select>
                        </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
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
</div>
<?php include("footer.php")?>