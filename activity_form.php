<?php include("form_header.php")?>
<?php include("comman/function.php")?>
<?php  $events = get_events(); 
$coordinators = get_coordinators();
$event_levels = get_event_level();?>
<?php session_start(); if(!isset($_SESSION["isLogedin"]) || $_SESSION["isLogedin"] !=true) {
    header("Location: index.php");
}?>
<div class="container-fluid" style="padding:50px">
    <div class="container">
        <form method="post">
            <div class="row justify-content-center">
                <div class="col-sm-6 card-header bg-success text-white text-center ">
                    <h3 style="padding-bottom:20px">Activity Form</h3>
                </div>
            </div>
            <!-- <div class="row justify-content-center"> -->
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Name of the program</label>
                        <input type="text" class="form-control is-invalid" name="programe_name" id="programe_name"
                            placeholder="Program Name">
                        <span id="programe_name_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center ">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Level of the Event</label>
                        <select name="level" class="form-control is-invalid" id="level">
                            <option value="">[select]</option>
                            <?php foreach($event_levels as $event_level) {?>
                            <option value="<?php echo $event_level['id']?>"><?php echo $event_level['level']?></option>
                            <?php }?>
                        </select>
                        <span id="level_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Venue</label>
                        <textarea class="form-control is-invalid" name="venue" id="venue"
                            placeholder="Venue"></textarea>
                        <span id="venue_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h4>Date:</h4>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">From</label>
                        <input type="text" class="form-control is-invalid" name="from" id="from" placeholder="From">
                        <span id="from_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">To</label>
                        <input type="text" class="form-control is-invalid" name="to" id="to" placeholder="To">
                        <span id="to_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Coordinator Name</label>
                        <select name="coordinator_name" class="form-control is-invalid" id="coordinator_name">
                            <option value="">[select]</option>
                            <?php foreach($coordinators as $coordinator) {?>
                            <option value="<?php echo $coordinator['id']?>"><?php echo $coordinator['name']?></option>
                            <?php }?>
                        </select>
                        <span id="coordinator_name_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Event Organaized By</label>
                        <input type="text" class="form-control is-invalid" name="org_by" id="org_by"
                            placeholder="Event Organaized By">
                        <span id="org_by_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Event Name</label>
                        <select name="event_name" class="form-control is-invalid" id="event_name">
                            <option value="">[select]</option>
                            <?php foreach($events as $event) {?>
                            <option value="<?php echo $event['event_id']?>"><?php echo $event['name']?></option>
                            <?php }?>
                        </select>
                        <span id="event_name_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6" id="radio-section" style="display:none">
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
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sub Events</label>
                        <select name="sub_event_name" class="form-control is-invalid" id="sub_event_name">
                            <option value="">[No Sub Events]</option>
                        </select>
                        <span id="sub_event_name_err" style="color:red"></span>
                    </div>
                </div>
                </div>
                <div class="row justify-content-center">
                <div class="col-sm-6">
                    <table class=" table table-bordered table-striped" id="Student_list">
                    </table>
                </div>
                </div>

            <!-- </div> -->
            <!-- <div class="row justify-content-center"> -->
            <div class="row justify-content-center">
                <div class="col-sm-6 ">
                    <button type="button" onclick="return save_full_list()" class="btn btn-outline-warning">Save &
                        Next</button>
                </div>
                </div>  
            <!-- </div> -->
        </form>
    </div>
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
        data.append("date", $("#from").val());
        $.ajax({
            type: "POST",
            async: false,
            url: 'comman/api.php?action=get_student_list',
            data: data,
            cache: false,
            processData: false, // important
            contentType: false,
            success: function(result) {
                $("#Student_list").html(result)
            }
        });

    } else {
        $("#radio-section").hide();
    }
});

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
});
</script>

<script>
function save_full_list() {
    var valid = 0;
    if ($('#programe_name').val() == '') {
        $('#programe_name_err').text('Please enter event name');
        $('#programe_name').css('border-color', 'red');
        $("#programe_name").focus();
        return false;
    } else {
        $('#programe_name').css('border-color', 'green');
        $('#programe_name_err').text('');
        valid++;
    }
    if ($('#level').val() == '') {
        $('#level_err').text('Please enter event name');
        $('#level').css('border-color', 'red');
        $("#level").focus();
        return false;
    } else {
        $('#level').css('border-color', 'green');
        $('#level_err').text('');
        valid++;
    }
    if ($('#venue').val() == '') {
        $('#venue_err').text('Please enter event name');
        $('#venue').css('border-color', 'red');
        $("#venue").focus();
        return false;
    } else {
        $('#venue').css('border-color', 'green');
        $('#venue_err').text('');
        valid++;
    }
    if ($('#from').val() == '') {
        $('#from_err').text('Please enter event name');
        $('#from').css('border-color', 'red');
        $("#from").focus();
        return false;
    } else {
        $('#from').css('border-color', 'green');
        $('#from_err').text('');
        valid++;
    }
    if ($('#to').val() == '') {
        $('#to_err').text('Please enter event name');
        $('#to').css('border-color', 'red');
        $("#to").focus();
        return false;
    } else {
        $('#to').css('border-color', 'green');
        $('#to_err').text('');
        valid++;
    }

    if ($('#coordinator_name').val() == '') {
        $('#coordinator_name_err').text('Please enter event name');
        $('#coordinator_name').css('border-color', 'red');
        $("#coordinator_name").focus();
        return false;
    } else {
        $('#coordinator_name').css('border-color', 'green');
        $('#coordinator_name_err').text('');
        valid++;
    }

    if ($('#org_by').val() == '') {
        $('#org_by_err').text('Please enter event name');
        $('#org_by').css('border-color', 'red');
        $("#org_by").focus();
        return false;
    } else {
        $('#org_by').css('border-color', 'green');
        $('#org_by_err').text('');
        valid++;
    }
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
    if (valid == 10) {
        var data = new FormData();
        data.append("event_id", $("#event_name").val());
        data.append("event_name", $("#event_name  option:selected").text());
        data.append("sub_event_id", $("#sub_event_name").val());
        data.append("sub_event_name", $("#sub_event_name  option:selected").text());
        data.append("programe_name", $("#programe_name").val());
        data.append("level", $("#level").val());
        data.append("venue", $("#venue").val());
        data.append("from", $("#from").val());
        data.append("to", $("#to").val());
        data.append("coordinator_name", $("#coordinator_name").val());
        data.append("org_by", $("#org_by").val());
        data.append("cat", cate);
        $.ajax({
            type: "POST",
            async: false,
            url: 'comman/api.php?action=save_full_list',
            data: data,
            cache: false,
            processData: false, // important
            contentType: false,
            success: function(result) {
                $("#sub_event_name").html(result);
                window.location.reload();
            }
        });
    }
}
</script>

<script>
$('#programe_name,#venue,#org_by').keyup(function() {
    if ($(this).val() != '') {
        $(this).removeClass('is-invalid');
        $(this).addClass('is-valid');
    } else {
        $(this).addClass('is-invalid');
        $(this).removeClass('is-valid');
    }

})

$('#level,#coordinator_name,#event_name,#sub_event_name,#from,#to').change(function() {
    if ($(this).val() != '') {
        $(this).removeClass('is-invalid');
        $(this).addClass('is-valid');
    } else {
        $(this).addClass('is-invalid');
        $(this).removeClass('is-valid');
    }

})
</script>

<script>
$("#from").change(function() {
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
        data.append("date", $("#from").val());
        $.ajax({
            type: "POST",
            async: false,
            url: 'comman/api.php?action=get_student_list',
            data: data,
            cache: false,
            processData: false, // important
            contentType: false,
            success: function(result) {
                $("#Student_list").html(result)
            }
        });

    } else {
        $("#radio-section").hide();
    }
});

</script>