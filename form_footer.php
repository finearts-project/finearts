</body>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/dist/js/popper.min.js"></script>
<script src="assets/dist/js/bootstrap.min.js" ></script>
<script src="assets/dist/js/jquery-ui.min.js" ></script>
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/dist/js/BsMultiSelect.js"></script>
<script>
$("#logout").click(function(){
    $.post("comman/api.php?action=logout",function(){
        window.location.href = "director_login.php";
    })
})
</script>
</html>