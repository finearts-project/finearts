<?php 
include('conn.php');
extract($GLOBALS);
$action = '';
if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];
}
if($action == 'login')
{   session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    if($role == 'coordinator')
    {
        $query = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password' AND `role` = 'coordinator' AND `status` = 'N'";
    }
    else if($role == 'director')
    {
        $query = "SELECT * FROM `admin` WHERE `email` = '$email' AND `password` = '$password' AND `role` = 'director' AND `status` = 'N'";
    }
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    if($result->num_rows > 0)
    {
    $response['status'] = "success";
    $_SESSION["isLogedin"] = true;
    $response['rows'] = $result->num_rows;
    }
    else {
        $response['status'] = "fail";
        $response['rows'] = 0;
    }
    echo json_encode($response);
}

else if($action =='get_sub_event')
{
        extract($GLOBALS);
        $id = $_POST['id'];
        $cat = $_POST['cat'];
        $query = "SELECT * FROM `sub_events` WHERE `event_id` = $id AND `type` = '$cat' AND `status` = 'N'" ;
        $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
        $arr = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        $output = '';
        foreach($arr as $sub_event)
        {
             $output .= '<option value="'.$sub_event['id'].'">'.$sub_event['name']."</option>";
            //echo $sub_event['id'];
        }
        echo $output;
        mysqli_close($link);
}

else if($action == 'save_event')
{
    extract($GLOBALS);
    $event_name = $_POST['event_name'];
    $event_id = $_POST['event_id'];
    $sub_event_name = $_POST['sub_event_name'];
    $sub_event_id = $_POST['sub_event_id'];
    $type = $_POST['cat'];
    $date = date("d-m-y");
    $query ="INSERT INTO `event_entry` ( `event_name`, `event_id`, `sub_event_name`, `sub_event_id`, `type`, `status`, `create_date`) 
            VALUES ('$event_name', '$event_id', '$sub_event_name ', '$sub_event_id ', ' $type', 'N', '$date');";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $req_id = mysqli_insert_id($link);
    echo $req_id;
}

else if($action == 'logout'){
    session_start();
    session_destroy();    
}

else if($action == 'save_students_event')
{
    extract($GLOBALS);
    $reg_no = explode(",",$_POST['reg_no']);
    $name = explode(",",$_POST['name']);
    $course = explode(",",$_POST['course']);
    $year = explode(",",$_POST['year']);
    $event_id =$_POST['event_id'];
    $sub_event_id = $_POST['sub_event_id'];
    $event_name = $_POST['event_name'];
    $sub_event_name =$_POST['sub_event_name'];
    $date = date("yy-m-d");
    for($i=0; $i<count($reg_no);$i++)
    {
        $query = "INSERT INTO `selection_form` (`register_no`, `name`, `course`, `year`, `create_date`,`event_id`,`sub_event_id`,`event_name`,`sub_event_name`) 
                    VALUES ('$reg_no[$i]', '$name[$i]', '$course[$i]', '$year[$i]', '$date','$event_id','$sub_event_id','$event_name','$sub_event_name');";
        $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    }
    echo true;
}