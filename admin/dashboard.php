<?php  session_start();
     if(!isset($_SESSION["isAdminLogedin"]) || $_SESSION["isAdminLogedin"] !=true) {
        header("Location: index.php");
     }?>
<?php include("header.php")?>
<div class="content-wrapper">
</div>
<?php include("footer.php")?>