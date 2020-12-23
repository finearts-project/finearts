<?php 
include('conn.php');
function get_events(){
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

function get_event_level(){
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
?>