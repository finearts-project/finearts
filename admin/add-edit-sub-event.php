<?php  session_start();
     if(!isset($_SESSION["isAdminLogedin"]) || $_SESSION["isAdminLogedin"] !=true) {
        header("Location: index.php");
     }?>
<?php include("header.php")?>
<?php include("function-admin.php")?>
<?php
$events = get_evnts();
 extract($GLOBALS);
    if($_REQUEST['edit']){
        $id = $_REQUEST['edit'];
        $query = "SELECT * FROM `sub_events` WHERE `id` = $id";
       // $query = "SELECT sub_events.*,events.name as evt_name,events.event_id as evt_id FROM sub_events JOIN events ON events.event_id = sub_events.event_id WHERE sub_events.status = 'N' AND  sub_events.id = $id";
        $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        //print_r($arr);exit;
        $event_id = $arr[0]['event_id'];
        $sub_event_name = $arr[0]['name'];
        $f_desc = $arr[0]['description'];
        $type = $arr[0]['type'];
    }

   if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $ids = $_POST['evt_id'];
        $main_event_name = $_POST['main_event_name'];
        $evname = $_POST['sub_event_name'];
        $desc = $_POST['desc'];
        $type = $_POST['type'];
    if($ids){
        $query = "UPDATE `sub_events` SET 
        `event_id` = '$main_event_name', 
        `name` = '$evname', 
        `description` = '$desc', 
        `type` = '$type' 
        WHERE `sub_events`.`id` = $ids;";
         $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    }
    else {

        $main_event_name = $_POST['main_event_name'];
        $evname = $_POST['sub_event_name'];
        $desc = $_POST['desc'];
        $type = $_POST['type'];
        $date = date("yy-m-d");
        $query = "INSERT INTO `sub_events` (`event_id`, `name`,`description`,`type`,`create_date`)
        VALUES ('$main_event_name','$evname','$desc','$type','$date')";
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
                <form id="quickForm" role="form" method="post" action="add-edit-sub-event.php" accept-charset="utf-8"
                    enctype="multipart/form-data">
                    <input type="hidden" name="evt_id" value="<?php echo  check_null($arr[0]["id"])?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Manin Event Name</label>
                            <select class="form-control" id="main_event_name" name="main_event_name" required>
                                <option value="">[select]</option>
                                <?php foreach($events as $event) {?>
                                <option value="<?php echo $event['event_id']?>" <?php if($event_id == $event['event_id']){echo "selected";}?>  ><?php echo $event['name']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Event Name</label>
                            <input type="text" class="form-control" value="<?php echo check_null($sub_event_name)?>"
                                id="sub_event_name" name="sub_event_name" required placeholder="Event Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Event Description</label>
                            <input type="text" class="form-control" value="<?php echo check_null($f_desc)?>" id="desc"
                                name="desc" required placeholder="Enter Description">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Type</label>
                            <select class="form-control" id="type" name="type" required>
                                <option value="">[select]</option>
                                <option value="solo" <?php if($type == 'solo'){echo"selected";}?>>Solo</option>
                                <option value="group"  <?php if($type == 'group'){echo"selected";}?>>Group</option>
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