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
    $event_date =$_POST['event_date'];
    $sub_event_id = $_POST['sub_event_id'];
    $event_name = $_POST['event_name'];
    $sub_event_name =$_POST['sub_event_name'];
    $date = date("yy-m-d");
    for($i=0; $i<count($reg_no);$i++)
    {
        $query = "INSERT INTO `selection_form` (`register_no`, `name`, `course`, `year`, `create_date`,`event_id`,`sub_event_id`,`event_name`,`sub_event_name`,`event_date`) 
                    VALUES ('$reg_no[$i]', '$name[$i]', '$course[$i]', '$year[$i]', '$date','$event_id','$sub_event_id','$event_name','$sub_event_name','$event_date');";
        $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    }
    echo true;
}
else if($action == 'get_student_list'){
    extract($GLOBALS);
    $id = $_POST['id'];
    $date = $_POST['date'];
    $query = "SELECT * FROM `selection_form` WHERE `event_id` = $id AND `event_date` = '$date' AND `delete_status` = 'N'" ;
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    $output = '<thead>
    <th>Roll Number</th>
    <th>Name</th>
    <th>Sub Event</th>
    <th>Course</th>
    <th>Year</th>
    </thead><tbody>';
    foreach($arr as $value)
    {
        $output .= '<tr>
        <td>'.$value["register_no"].'</td> 
        <td>'.$value["name"].'</td> 
        <td>'.$value["sub_event_name"].'</td> 
        <td>'.$value["course"].'</td>
         <td>'.$value["year"].'</td> 
         </tr>';
    }
    $output .= '</tbody>';
    if(empty($arr))
    {
        $output = '';
    }
    echo $output;
}

else if($action=="save_full_list"){
    extract($GLOBALS);
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $sub_event_id = $_POST['sub_event_id'];
    $sub_event_name = $_POST['sub_event_name'];
    $programe_name = $_POST['programe_name'];
    $level = $_POST['level'];
    $venue = $_POST['venue'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $coordinator_name = $_POST['coordinator_name'];
    $org_by = $_POST['org_by'];
    $cat = $_POST['cat'];
    $query2 =  $query = "SELECT * FROM `selection_form` WHERE `event_id` = $event_id AND `event_date` = '$from' AND `delete_status` = 'N'" ;
    $result2 = mysqli_query($link, $query2) or die('Error in Query.' . mysqli_error($link));
    $arr = array();
    while ($row = mysqli_fetch_assoc($result2)) {
        $arr[] = $row;
    }
    foreach($arr as $value){
        $std_name = $value["name"];
        $std_reg_no = $value["register_no"];

    $query = "INSERT INTO `activity_form` (`event_id`, `event_name`, `sub_event_id`, `sub_event_name`, `programe_name`, `level`, `venue`, `from_date`, `to_date`, `coordinator_name`, `org_by`, `cat`,`student_reg_no`,`student_name`) 
                VALUES ( '$event_id', '$event_name', '$sub_event_id', '$sub_event_name', 
                '$programe_name', '$level', '$venue', '$from', '$to', '$coordinator_name', '$org_by', '$cat','$std_name','$std_reg_no');";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
    }
    echo $result;
}

else if($action == 'save_post_list'){
    extract($GLOBALS);
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $org_by = $_POST['org_by'];
    $level = $_POST['level'];
    $over_all = $_POST['over_all'];
    $photo = $_POST['photo'];
    $std_reg = $_POST['std_reg'];
    $std_name = $_POST['std_name'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    $coordinator_name = $_POST['coordinator_name'];
    $cat = $_POST['cat'];
    $sub_event_id = $_POST['sub_event_id'];
    $sub_event_name = $_POST['sub_event_name'];
    $date = date("yy-d-m");
    $query = "INSERT INTO `post_activity` (`event_name`, `event_id`, `sub_event_name`, `sub_event_id`, `from_date`, `to_date`, `org_by`, `level`, `over_all`, `photo`, `reg_no`, `name`, `course`, `year`, `coordinator_name`, `created_date`) 
                                   VALUES ('$event_name', '$event_id','$sub_event_name','$sub_event_id', '$from',     '$to',   '$org_by ','$level','$over_all','photo','$std_reg','$std_name','$course', '$year', '$coordinator_name', '$date');";
    $result = mysqli_query($link, $query) or die('Error in Query.' . mysqli_error($link));
}
