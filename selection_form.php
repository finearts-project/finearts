<?php include("form_header.php")?>
<?php include("comman/function.php")?>
<div class="container" style="padding:50px">
    <h3 style="padding-bottom:20px">Selection Form</h3>
    <form>
        <div class="row">
            <div class="col-10">
                <div class="form-group">
                    <label>Event Name</label>
                    <select name="event_name" class="form-control" id="event_name">
                    </select>
                    <span id="event_name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Sub Events</label>
                    <select  name="sub_event_name" class="form-control" id="sub_event_name">
                        <option value="">[No Sub Events]</option>
                        <option value="">[No Sub Events]</option>
                        <option value="">[No Sub Events]</option>
                        <option value="">[No Sub Events]</option>
                    </select>
                    <span id="sub_event_name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Register Number</label>
                    <select multiple="multiple"name="reg_no[]" class="form-control" id="reg_no">
                        <option value="">[No Sub Events]</option>
                        <option value="">[No Sub Events]</option>
                        <option value="">[No Sub Events]</option>
                        <option value="">[No Sub Events]</option>
                    </select>
                    <span id="reg_no_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <select name="name" class="form-control" id="name">
                        <option value="">[No Sub Events]</option>
                    </select>
                    <span id="name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Course</label>
                    <select name="course" class="form-control" id="course">
                        <option value="">[No Sub Events]</option>
                    </select>
                    <span id="course_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">year</label>
                    <select name="year" class="form-control" id="year">
                        <option value="">[No Sub Events]</option>
                    </select>
                    <span id="year_err" style="color:red"></span>
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
$(document).ready(function() {
    $("select#reg_no").bsMultiSelect();
    var event_name = localStorage.getItem('eventName');
    var event_id = localStorage.getItem('eventId');
    var sub_event = localStorage.getItem('subEventName');
    var sub_event_id = localStorage.getItem('subEventId');
    $("#event_name").html("<option value=" + event_id + ">" + event_name + "</option>");
    $("#sub_event_name").html("<option value=" + sub_event_id + ">" + sub_event + "</option>");
})
</script>