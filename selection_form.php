<?php include("form_header.php")?>
<?php include("comman/function.php")?>
<div class="container" style="padding:50px">
    <h3 style="padding-bottom:20px">Selection Form</h3>
    <form method="post">
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
                    <select name="sub_event_name" class="form-control" id="sub_event_name">
                    </select>
                    <span id="sub_event_name_err" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Date</label>
                    <input type="text" name="event_date" class="form-control" id="event_date">
                    <span id="event_date_err" style="color:red"></span>
                </div>
            </div>
        </div>
        <div id="add-student" class="row">
            <div class="col-10">
                <h5>Student 1</h5>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Register Number</label>
                    <input type="text" class="form-control" name="std_reg_1" id="std_reg_1"
                        placeholder="Register Number">
                    <span id="reg_no_err_1" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="std_name_1" id="std_name_1" class="form-control" placeholder="Name">
                    <span id="name_err_1" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">Course</label>
                    <select name="course_1" class="form-control" id="course_1">
                        <option value="">[No Sub Events]</option>
                        <option value="ug">UG</option>
                        <option value="pg">PG</option>
                    </select>
                    <span id="course_err_1" style="color:red"></span>
                </div>
            </div>
            <div class="col-10">
                <div class="form-group">
                    <label for="exampleInputPassword1">year</label>
                    <select name="year_1" class="form-control" id="year_1">
                        <option value="">[No Sub Events]</option>
                        <option value="1">I</option>
                        <option value="2">II</option>
                        <option value="3">III</option>
                    </select>
                    <span id="year_err_1" style="color:red"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-10">
                <button type="button" onclick="add_student()" class="btn btn-primary">Add Student</button>
                <button type="button" onclick="return save_event()" class="btn btn-primary">Save & Next</button>
            </div>
        </div>
    </form>
</div>
<?php include("form_footer.php")?>

<script>
$(document).ready(function() {
    var id_valid = 1;
    localStorage.setItem('id_valid', id_valid);
    //$("select#reg_no").bsMultiSelect();
    var event_name = localStorage.getItem('eventName');
    var event_id = localStorage.getItem('eventId');
    var sub_event = localStorage.getItem('subEventName');
    var sub_event_id = localStorage.getItem('subEventId');
    $("#event_name").html("<option value=" + event_id + ">" + event_name + "</option>");
    $("#sub_event_name").html("<option value=" + sub_event_id + ">" + sub_event + "</option>");


})

function add_student() {
    id_valid = localStorage.getItem('id_valid');
    id_valid++;
    var template = "";
    template += '<div class="col-10 del_id_' + id_valid + '" >';
    template += ' <h5>Student ' + id_valid + '</h5>';
    template += ' </div>';
    template += '<div class="col-10 del_id_' + id_valid + '">';
    template += '<div class="form-group">';
    template += ' <label for="exampleInputPassword1">Register Number</label>';
    template += ' <input type="text" class="form-control" name="std_reg_' + id_valid + '" id="std_reg_' + id_valid +
        '" placeholder="Register Number">';
    template += '  <span id="reg_no_err_' + id_valid + '" style="color:red"></span>';
    template += '       </div>';
    template += '</div>';
    template += '<div class="col-10 del_id_' + id_valid + '">';
    template += '<div class="form-group">';
    template += '<label for="exampleInputPassword1">Name</label>';
    template += ' <input type="text" name="std_name_' + id_valid + '" id="std_name_' + id_valid +
        '" class="form-control" placeholder="Name">';
    template += '<span id="name_err_' + id_valid + '" style="color:red"></span>';
    template += ' </div>';
    template += ' </div>';
    template += ' <div class="col-10 del_id_' + id_valid + '">';
    template += '  <div class="form-group">';
    template += '   <label for="exampleInputPassword1">Course</label>';
    template += ' <select name="course_' + id_valid + '" class="form-control" id="course_' + id_valid + '">';
    template += ' <option value="">[No Sub Events]</option>';
    template += '  <option value="ug">UG</option>';
    template += ' <option value="pg">PG</option>';
    template += '  </select>';
    template += ' <span id="course_err_' + id_valid + '" style="color:red"></span>';
    template += ' </div>';
    template += ' </div>';
    template += ' <div class="col-10 del_id_' + id_valid + '">';
    template += ' <div class="form-group">';
    template += ' <label for="exampleInputPassword1">year</label>';
    template += '  <select name="year_' + id_valid + '" class="form-control" id="year_' + id_valid + '">';
    template +=
        '  <option value="">[No Sub Events]</option> <option value="1">I</option> <option value="2">II</option> <option value="3">III</option>';
    template += ' </select>';
    template += '   <span id="year_err_' + id_valid + '" style="color:red"></span>';
    template += ' </div> <span class="del_id_' + id_valid + ' btn btn-sm btn-danger  value="del_id_' + id_valid +
        '" onclick="del_std(' + id_valid + ')">Delete Student</span>';
    template += '  </div> ';
    $("#add-student").append(template);
    localStorage.setItem('id_valid', id_valid);
    // alert( localStorage.getItem('id_valid'))
}

function del_std(id) {
    alert(id);
    var myobj = document.getElementsByClassName("del_id_" + id);
    myobj.remove();
}

function save_event() {
    var i;
    var reg_no = [];
    var name = [];
    var course = [];
    var year = [];
    var valid = localStorage.getItem('id_valid');
    for (i = 1; i <= valid; i++) {
        if (document.getElementById("std_reg_" + i).value == '') {
            document.getElementById("reg_no_err_" + i).innerHTML = 'Please enter the student register number';
            document.getElementById("std_reg_" + i).focus();
            return false;
        } else {
            document.getElementById("reg_no_err_" + i).innerHTML = '';
            reg_no.push(document.getElementById("std_reg_" + i).value)
        }
        if (document.getElementById("std_name_" + i).value == '') {
            document.getElementById("name_err_" + i).innerHTML = 'Please enter the student name';
            document.getElementById("std_name_" + i).focus();
            return false;
        } else {
            document.getElementById("name_err_" + i).innerHTML = '';
            name.push(document.getElementById("std_name_" + i).value);
        }
        if (document.getElementById("course_" + i).value == '') {
            document.getElementById("course_err_" + i).innerHTML = 'Please enter the student name';
            document.getElementById("course_" + i).focus();
            return false;
        } else {
            document.getElementById("course_err_" + i).innerHTML = '';
            course.push(document.getElementById("course_" + i).value);
        }
        if (document.getElementById("year_" + i).value == '') {
            document.getElementById("year_err_" + i).innerHTML = 'Please enter the student name';
            document.getElementById("year_" + i).focus();
            return false;
        } else {
            year.push(document.getElementById("year_" + i).value);
            document.getElementById("year_err_" + i).innerHTML = '';
        }
    }
    reg_no = reg_no.join();
    name = name.join();
    course = course.join();
    year = year.join();
    if (parseInt(i) - 1 == parseInt(valid)) {
        var data = new FormData();
        data.append("reg_no", reg_no);
        data.append("event_date", $("#event_date").val());
        data.append("name", name);
        data.append("course", course);
        data.append("year", year);
        data.append("event_id", $("#event_name").val());
        data.append("sub_event_id", $("#sub_event_name").val());
        data.append("event_name", $('#event_name  option:selected').text());
        data.append("sub_event_name", $('#sub_event_name  option:selected').text());

        $.ajax({
            type: "POST",
            async: false,
            url: 'comman/api.php?action=save_students_event',
            data: data,
            cache: false,
            processData: false, // important
            contentType: false,
            success: function(result) {
                if (result) {
                    window.location.href = "activity_form.php";
                } else {
                    $("#login_err").html("Email or Password is Incorrect");
                }
            }
        });
    }
}
</script>