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
        window.location.href = "index.php";
    })
})
</script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$("#from").datepicker({ dateFormat: 'yy-mm-dd' });
$("#to").datepicker({ dateFormat: 'yy-mm-dd' });
$("#event_date").datepicker({ dateFormat: 'yy-mm-dd' });
</script>
</html>