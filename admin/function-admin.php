<?php include('../comman/conn.php');

function get_selection_list(){
    extract($GLOBALS);
    $query = "SELECT * FROM `selection_form` ORDER BY id DESC";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return($arr);
    mysqli_close($link);
}
function get_activity_list(){
    extract($GLOBALS);
    $query = "SELECT * FROM `activity_form` ORDER BY id DESC";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return($arr);
    mysqli_close($link);
}

function get_evnts(){
    extract($GLOBALS);
    $query = "SELECT * FROM `events` WHERE `status` = 'N'";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return($arr);
    mysqli_close($link);
}

function get_levels(){
    extract($GLOBALS);
    $query = "SELECT * FROM `event_level` WHERE `delete_status` = 'N'";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return($arr);
    mysqli_close($link);
}

function check_login(){
    session_start();
     if(!isset($_SESSION["isAdminLogedin"]) || $_SESSION["isLogedin"] !=true) {
        header("Location: index.php");
     }
}


function get_post_activity_list(){
    extract($GLOBALS);
    $query = "SELECT * FROM `post_activity` ORDER BY id DESC";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return($arr);
    mysqli_close($link);
}

function get_coordinators(){
    extract($GLOBALS);
    $query = "SELECT * FROM `coordinators` WHERE `delete_status` = 'N'";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return($arr);
    mysqli_close($link);
}

function get_sub_evnts(){
    extract($GLOBALS);
    $query = "SELECT sub_events.*,events.name as evt_name FROM sub_events JOIN events ON events.event_id = sub_events.event_id WHERE sub_events.status = 'N'";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return($arr);
    mysqli_close($link);
}

function get_report(){
    extract($GLOBALS);
    $date = $_POST['date'];
    $query = "SELECT * FROM `selection_form` WHERE `event_date` = '$date' AND `delete_status` = 'N'" ;
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return($arr);
    mysqli_close($link);
}

$action = '';
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}
if($action == 'admin_login')
{
    extract($GLOBALS);
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; 
    $query = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password' AND `role` = 'admin' AND `status` = 'N'";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    if($result->num_rows > 0)
    {
    $response['status'] = "success";
    $_SESSION["isAdminLogedin"] = true;
    $response['rows'] = $result->num_rows;

    }
    else {
        $response['status'] = "fail";
        $response['rows'] = 0;
    }
    echo json_encode($response);
}

else if($action == 'del_coor')
{
    extract($GLOBALS);
    $id = $_POST['del_id'];
    $query = "UPDATE `coordinators` SET `delete_status` = 'Y' WHERE `id` = $id";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
}
else if($action == 'del_event')
{
    extract($GLOBALS);
    $id = $_POST['del_id'];
    $query = "UPDATE `events` SET `status` = 'Y' WHERE `event_id` = $id";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
}
else if($action == 'del_sub_event')
{
    extract($GLOBALS);
    $id = $_POST['del_id'];
    $query = "UPDATE `sub_events` SET `status` = 'Y' WHERE `id` = $id";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
}

else if($action == 'del_level')
{
    extract($GLOBALS);
    $id = $_POST['del_id'];
    $query = "UPDATE `event_level` SET `delete_status` = 'Y' WHERE `id` = $id";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
}
else if($action == 'logout'){
    session_start();
    session_destroy();    
}
?>