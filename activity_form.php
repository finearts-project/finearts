<?php include("form_header.php")?>
<?php include("comman/function.php")?>
<?php  $events = get_events(); 
$coordinators = get_coordinators();
$event_levels = get_event_level();?>
<?php session_start(); if(!isset($_SESSION["isLogedin"]) || $_SESSION["isLogedin"] !=true) {
    header("Location: director_login.php");
}?>
<div class="container" style="padding:50px">
    <h3 style="padding-bottom:20px">Activity Form</h3>
    <form method="post">
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    <label>Name of the program</label>
                    <input type="text" class="form-control" name="std_reg_1" id="std_reg_1"
                        placeholder="Register Number">
                    <span id="program_name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Level of the Event</label>
                    <select name="level" class="form-control" id="level">
                        <option value="">[select]</option>
                        <?php foreach($event_levels as $event_level) {?>
                        <option value="<?php echo $event_level['id']?>"><?php echo $event_level['level']?></option>
                        <?php }?>
                    </select>
                    <span id="level_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Venue</label>
                    <textarea class="form-control" name="venue" id="venue" placeholder="Venue"></textarea>
                    <span id="venue_err" style="color:red"></span>
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
                    <label for="exampleInputPassword1">Coordinator Name</label>
                    <select name="coordinator_name" class="form-control" id="coordinator_name">
                        <option value="">[select]</option>
                        <?php foreach($coordinators as $coordinator) {?>
                        <option value="<?php echo $coordinator['id']?>"><?php echo $coordinator['name']?></option>
                        <?php }?>
                    </select>
                    <span id="coordinator_name_err" style="color:red"></span>
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
                    <label for="exampleInputPassword1">Event Name</label>
                    <select name="event_name" class="form-control" id="event_name">
                        <option value="">[select]</option>
                        <?php foreach($events as $event) {?>
                        <option value="<?php echo $event['event_id']?>"><?php echo $event['name']?></option>
                        <?php }?>
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
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Sub Events</label>
                    <select name="sub_event_name" class="form-control" id="sub_event_name">
                        <option value="">[No Sub Events]</option>
                    </select>
                    <span id="sub_event_name_err" style="color:red"></span>
                </div>
            </div>
        </div>
        <div class="row">
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