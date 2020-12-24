<?php include("header.php")?>
<?php include("function-admin.php")?>
<?php
 extract($GLOBALS);
    if($_REQUEST['edit']){
        $id = $_REQUEST['edit'];
        $query = "SELECT * FROM `events` WHERE `event_id` = $id";
        $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        //print_r($arr);exit;
        $f_name = $arr[0]['name'];
        $f_desc = $arr[0]['description'];
    }

   if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $ids = $_POST['evt_id'];
    $ev_name = $_POST['event_name'];
    $desc = $_POST['desc'];
    if($ids){
        $query = "UPDATE `events` SET `name` = '$ev_name', `description` = '$desc' WHERE `events`.`event_id` = $ids";
         $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    }
    else {
        $evname = $_POST['event_name'];
        $desc = $_POST['desc'];
        $date = date("yy-m-d");
        $query = "INSERT INTO `events` ( `name`, `description`,  `type`,`create_date`)
        VALUES ('$evname','$desc',' ','$date')";
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
                <form id="quickForm" role="form" method="post" action="add-edit-events.php" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    <input type="hidden" name="evt_id" value="<?php echo  check_null($arr[0]["event_id"])?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Event Name</label>
                            <input type="text" class="form-control" value="<?php echo check_null($f_name)?>"
                                id="event_name" name="event_name" required placeholder="Enter RegNo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Event Description</label>
                            <input type="text" class="form-control" value="<?php echo check_null($f_desc)?>" id="desc"
                                name="desc" required placeholder="Enter Description">
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