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
?>