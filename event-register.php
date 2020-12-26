<?php include("form_header.php")?>
<?php include("comman/function.php")?>
<?php $events = get_events();?>
<?php session_start(); if(!isset($_SESSION["isLogedin"]) || $_SESSION["isLogedin"] !=true) {
    header("Location: index.php");
}?>
<div class="container" style="padding:50px">
<h3 style="padding-bottom:20px">Event Entry</h3>
    <form>
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    <label>Event Name</label>
                    <select name="event_name" class="form-control" id="event_name">
                        <option value="">[select]</option>
                        <?php foreach($events as $event) {?>
                        <option value="<?php echo $event['event_id']?>"><?php echo $event['name']?></option>
                        <?php }?>
                    </select>
                    <span id="event_name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10" id="radio-section" style="display:none">
                <div class="form-group">
                    <label for=""> Event Category</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="cat" value="solo">
                        <label class="form-check-label" for="exampleRadios2">
                            Solo
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="cat" value="group">
                        <label class="form-check-label" for="exampleRadios2">
                            Group
                        </label>
                    </div>
                    <span id="cat_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Sub Events</label>
                    <select name="sub_event_name" class="form-control" id="sub_event_name">
                        <option value="">[No Sub Events]</option>
                    </select>
                    <span id="sub_event_name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <button type="button" onclick="return save_event()" class="btn btn-primary">Save & Next</button>
            </div>
        </div>
    </form>
</div>
<?php include("form_footer.php")?>
<script>
$("#event_name").click(function() {
    var data = new FormData();
    var cat = $("input[name='cat']:checked").val();
    var event_name = $("#event_name").val();
    if (event_name != '') {
        $("#radio-section").show();
        data.append("id", $("#event_name").val());
        data.append("cat", cat);
        if (cat != 'undefined') {
            $.ajax({
                type: "POST",
                async: false,
                url: 'comman/api.php?action=get_sub_event',
                data: data,
                cache: false,
                processData: false, // important
                contentType: false,
                success: function(result) {
                    $("#sub_event_name").html(result)
                }
            });
        }
    } else {
        $("#radio-section").hide();
    }
})

$("input[name='cat']").click(function() {
    var data = new FormData();
    var cat = $("input[name='cat']:checked").val();
    var event_name = $("#event_name").val();
    if (event_name != '') {
        data.append("id", $("#event_name").val());
        data.append("cat", cat);
        $.ajax({
            type: "POST",
            async: false,
            url: 'comman/api.php?action=get_sub_event',
            data: data,
            cache: false,
            processData: false, // important
            contentType: false,
            success: function(result) {
                $("#sub_event_name").html(result)
            }
        });
    }
})

function save_event() {
    var valid = 0;
    if ($('#event_name').val() == '') {
        $('#event_name_err').text('Please enter event name');
        $('#event_name').css('border-color', 'red');
        $("#event_name").focus();
        return false;
    } else {
        $('#event_name').css('border-color', 'green');
        $('#event_name_err').text('');
        valid++;
    }
    var cate = $("input[name='cat']:checked").val();
    if (cate == undefined) {
        $('#cat_err').text('Please choose category');
        $("input[name='cat']").focus();
        return false;
    } else {
        $('#cat_err').text('');
        valid++;
    }
    if ($('#sub_event_name').val() == '') {
        $('#sub_event_name_err').text('Please enter event name');
        $('#sub_event_name').css('border-color', 'red');
        $("#sub_event_name").focus();
        return false;
    } else {
        $('#sub_event_name').css('border-color', 'green');
        $('#sub_event_name_err').text('');
        valid++;
    }
    if (valid == 3) {
        localStorage.setItem("eventName", $('#event_name  option:selected').text());
        localStorage.setItem("eventId", $('#event_name').val());
        localStorage.setItem("subEventName", $('#sub_event_name  option:selected').text());
        localStorage.setItem("subEventId", $('#sub_event_name').val());

        var data = new FormData();
        var event_name = $("#event_name").val();
            data.append("event_id", $("#event_name").val());
            data.append("cat", $("input[name='cat']:checked").val());
            data.append("sub_event_id", $("#sub_event_name").val());
            data.append("event_name",  $('#event_name  option:selected').text());
            data.append("sub_event_name",  $('#sub_event_name  option:selected').text());
            $.ajax({
                type: "POST",
                async: false,
                url: 'comman/api.php?action=save_event',
                data: data,
                cache: false,
                processData: false, // important
                contentType: false,
                success: function(result) {
                    window.location.href="selection_form.php";
                }
            });
        }
    }
</script>