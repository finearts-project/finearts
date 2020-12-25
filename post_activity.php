<?php include("form_header.php")?>
<?php include("comman/function.php")?>
<?php  
$events = get_events(); 
$coordinators = get_coordinators();
$event_levels = get_event_level();?>
<?php session_start(); if(!isset($_SESSION["isLogedin"]) || $_SESSION["isLogedin"] !=true) {
    header("Location: director_login.php");
}?>
<div class="container" style="padding:50px">
    <h3 style="padding-bottom:20px">Post Activity Form</h3>
    <form method="post">
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Event Name</label>
                    <select name="event_name" class="form-control" id="event_name">
                        <option value="">[select]</option>
                        <?php foreach($events as $event) {?>
                        <option value="<?php echo $event['event_id']?>"><?php echo $event['name']?></option>
                        <?php }?>
                    </select>
                    <span id="event_name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <h4>Date:</h4>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">From</label>
                    <input type="text" class="form-control" name="from" id="from" placeholder="From">
                    <span id="from_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">To</label>
                    <input type="text" class="form-control" name="to" id="to" placeholder="To">
                    <span id="to_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Event Organaized By</label>
                    <input type="text" class="form-control" name="org_by" id="org_by" placeholder="Event Organaized By">
                    <span id="org_by_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Level of the Event</label>
                    <select name="level" class="form-control" id="level">
                        <option value="">[select]</option>
                        <?php foreach($event_levels as $event_level) {?>
                        <option value="<?php echo $event_level['level']?>"><?php echo $event_level['level']?></option>
                        <?php }?>
                    </select>
                    <span id="level_err" style="color:red"></span>
                </div>
            </div>

            <div class="col-10">
                <div class="form-group">
                    <label>Over All Winning</label>
                    <select type="text" class="form-control" name="over_all" id="over_all">
                        <option value="">[select]</option>
                        <option value="winner">Winner</option>
                        <option value="runner">Runner</option>
                        <option value="other">Other</option>
                    </select>
                    <span id="over_all_err" style="color:red"></span>
                </div>
            </div>

            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" placeholder="Photo">
                    <span id="photo_err" style="color:red"></span>
                </div>
            </div>

            <div class="col-10">
                <h3> Student Profile</h3>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Register Number</label>
                    <input type="text" class="form-control" name="std_reg" id="std_reg" placeholder="Register Number">
                    <span id="reg_no_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="std_name" id="std_name" class="form-control" placeholder="Name">
                    <span id="name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Course</label>
                    <select name="course" class="form-control" id="course">
                        <option value="">[No Sub Events]</option>
                        <option value="ug">UG</option>
                        <option value="pg">PG</option>
                    </select>
                    <span id="course_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">year</label>
                    <select name="year" class="form-control" id="year">
                        <option value="">[No Sub Events]</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                    </select>
                    <span id="year_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Coordinator Name</label>
                    <select name="coordinator_name" class="form-control" id="coordinator_name">
                        <option value="">[select]</option>
                        <?php foreach($coordinators as $coordinator) {?>
                        <option value="<?php echo $coordinator['name']?>"><?php echo $coordinator['name']?></option>
                        <?php }?>
                    </select>
                    <span id="coordinator_name_err" style="color:red"></span>
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
        </div>
        <div class="row">
            <div class="col-10">
                <button type="button" onclick="return save_post_list()" class="btn btn-primary">Save & Next</button>
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
function save_post_list() {
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
    if ($('#over_all').val() == '') {
        $('#over_all_err').text('Please enter event name');
        $('#over_all').css('border-color', 'red');
        $("#over_all").focus();
        return false;
    } else {
        $('#over_all').css('border-color', 'green');
        $('#over_all_err').text('');
        valid++;
    }
    if ($('#photo').val() == '') {
        $('#photo_err').text('Please enter photo');
        $('#photo').css('border-color', 'red');
        $("#photo").focus();
        return false;
    } else {
        $('#photo').css('border-color', 'green');
        $('#photo_err').text('');
        valid++;
    }
    if ($('#std_reg').val() == '') {
        $('#reg_no_err').text('Please enter register Number');
        $('#std_reg').css('border-color', 'red');
        $("#std_reg").focus();
        return false;
    } else {
        $('#std_reg').css('border-color', 'green');
        $('#reg_no_err').text('');
        valid++;
    }
    if ($('#std_name').val() == '') {
        $('#name_err').text('Please enter Name');
        $('#std_name').css('border-color', 'red');
        $("#std_name").focus();
        return false;
    } else {
        $('#std_name').css('border-color', 'green');
        $('#name_err').text('');
        valid++;
    }
    if ($('#course').val() == '') {
        $('#course_err').text('Please enter course');
        $('#course').css('border-color', 'red');
        $("#course").focus();
        return false;
    } else {
        $('#course').css('border-color', 'green');
        $('#course_err').text('');
        valid++;
    }
    if ($('#year').val() == '') {
        $('#year_err').text('Please enter Year');
        $('#year').css('border-color', 'red');
        $("#year").focus();
        return false;
    } else {
        $('#year').css('border-color', 'green');
        $('#year_err').text('');
        valid++;
    }
    if ($('#coordinator_name').val() == '') {
        $('#coordinator_name_err').text('Please coordinator name');
        $('#coordinator_name').css('border-color', 'red');
        $("#coordinator_name").focus();
        return false;
    } else {
        $('#coordinator_name').css('border-color', 'green');
        $('#coordinator_name_err').text('');
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
    // if ($('#sub_event_name').val() == '') {
    //     $('#sub_event_name_err').text('Please enter event name');
    //     $('#sub_event_name').css('border-color', 'red');
    //     $("#sub_event_name").focus();
    //     return false;
    // } else {
    //     $('#sub_event_name').css('border-color', 'green');
    //     $('#sub_event_name_err').text('');
    //     valid++;
    // }
    if (valid == 13) {
        var data = new FormData();
        data.append("event_id", $("#event_name").val());
        data.append("event_name", $("#event_name  option:selected").text());
        data.append("from", $("#from").val());
        data.append("to", $("#to").val());
        data.append("org_by", $("#org_by").val());
        data.append("level", $("#level").val());
        data.append("over_all", $("#over_all").val());
        data.append("photo",$("#photo").prop('files')[0]);
        data.append("std_reg", $("#std_reg").val());
        data.append("std_name", $("#std_name").val());
        data.append("course", $("#course").val());
        data.append("year", $("#year").val());
        data.append("coordinator_name", $("#coordinator_name option:selected").val());
        data.append("cat", cate);
        data.append("sub_event_id", $("#sub_event_name").val());
        data.append("sub_event_name", $("#sub_event_name  option:selected").text());
        $.ajax({
            type: "POST",
            async: false,
            url: 'comman/api.php?action=save_post_list',
            data: data,
            cache: false,
            processData: false, // important
            contentType: false,
            success: function(result) {
                $("#sub_event_name").html(result);
               // window.location.reload();
            }
        });
    }
}
</script>