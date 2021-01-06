<?php session_start(); if(!isset($_SESSION["isLogedin"]) || $_SESSION["isLogedin"] !=true) {
    header("Location: index.php");
}?><?php include("form_header.php")?>
<?php include("comman/function.php")?>
<?php $events = get_events();?>
<div class="container-fluid" style="padding:50px">
    <div class="container">
        <!-- <div class="row justify-content-center"> -->
        <form method="post">
            <div class="row justify-content-center">
                <div class="col-3"></div>
                <div class="col-6 card-header bg-success text-white text-center ">
                    <center>
                        <h3 style="padding-bottom:20px">Selection Form</h3>
                    </center>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Event Name</label>
                        <select name="event_name" class="form-control is-invalid" id="event_name">
                            <option value="">[select]</option>
                            <?php foreach($events as $event) {?>
                            <option value="<?php echo $event['event_id']?>"><?php echo $event['name']?></option>
                            <?php }?>
                        </select>
                        <span id="event_name_err" style="color:red"></span>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>

                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">

                    <div class="row  justify-content-center">
                        <div class="col-sm-12" id="radio-section" style="display:none">
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
                </div>
                <div class="col-sm-3">
                </div>


                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Sub Events</label>
                        <select name="sub_event_name" class="form-control is-invalid" id="sub_event_name">
                        </select>
                        <span id="sub_event_name_err" style="color:red"></span>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Date</label>
                        <input type="text" name="event_date" class="form-control is-invalid" id="event_date">
                        <span id="event_date_err" style="color:red"></span>
                    </div>
                </div>
                <div class="col-sm-3">
                </div>
            </div>

            <div id="add-student" class="row justify-content-center">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <h5>Student 1</h5>
                </div>
                <div class="col-sm-3"></div>

                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Register Number</label>
                        <input type="text" class="form-control is-invalid" name="std_reg_1" id="std_reg_1"
                            placeholder="Register Number">
                        <span id="reg_no_err_1" style="color:red"></span>
                    </div>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Name</label>
                        <input type="text" name="std_name_1" id="std_name_1" class="form-control is-invalid"
                            placeholder="Name">
                        <span id="name_err_1" style="color:red"></span>
                    </div>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Course</label>
                        <select name="course_1" class="form-control is-invalid" id="course_1">
                            <option value="">[No Sub Events]</option>
                            <option value="ug">UG</option>
                            <option value="pg">PG</option>
                        </select>
                        <span id="course_err_1" style="color:red"></span>
                    </div>
                </div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputPassword1">year</label>
                        <select name="year_1" class="form-control is-invalid" id="year_1">
                            <option value="">[No Sub Events]</option>
                            <option value="1">I</option>
                            <option value="2">II</option>
                            <option value="3">III</option>
                        </select>
                        <span id="year_err_1" style="color:red"></span>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>

            <div class="row  justify-content-center">
                <div class="col-sm-6">
                    <button type="button" onclick="add_student()" class="btn btn-primary">Add Student</button>
                    <button type="button" onclick="return save_event()" class="btn btn-primary">Save & Next</button>
                </div>
            </div>
        </form>
        <!-- </div> -->
    </div>
    </di>
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
        //$("#event_name").html("<option value=" + event_id + ">" + event_name + "</option>");
        //$("#sub_event_name").html("<option value=" + sub_event_id + ">" + sub_event + "</option>");


    })

    function add_student() {
        id_valid = localStorage.getItem('id_valid');
        id_valid++;
        var template = "";
        template += ' <div class="col-sm-3"></div>';
        template += '<div class="col-6 del_id_' + id_valid + '">';
        template += ' <h5 id="std-count' + id_valid + '">Student ' + id_valid + '</h5>';
        template += ' </div>';
        template += ' <div class="col-sm-3"></div>';
        template += ' <div class="col-sm-3"></div>';
        template += '<div class="col-sm-6 del_id_' + id_valid + '">';
        template += '<div class="form-group">';
        template += ' <label for="exampleInputPassword1">Register Number</label>';
        template += ' <input type="text" class="form-control is-invalid" name="std_reg_' + id_valid + '" id="std_reg_' +
            id_valid +
            '" placeholder="Register Number">';
        template += '  <span id="reg_no_err_' + id_valid + '" style="color:red"></span>';
        template += '       </div>';
        template += '</div>';
        template += ' <div class="col-sm-3"></div>';
        template += ' <div class="col-sm-3"></div>';
        template += '<div class="col-sm-6 del_id_' + id_valid + '">';
        template += '<div class="form-group">';
        template += '<label for="exampleInputPassword1">Name</label>';
        template += ' <input type="text" name="std_name_' + id_valid + '" id="std_name_' + id_valid +
            '" class="form-control is-invalid" placeholder="Name">';
        template += '<span id="name_err_' + id_valid + '" style="color:red"></span>';
        template += ' </div>';
        template += ' </div>';
        template += ' <div class="col-sm-3"></div>';
        template += ' <div class="col-sm-3"></div>';
        template += ' <div class="col-sm-6 del_id_' + id_valid + '">';
        template += '  <div class="form-group">';
        template += '   <label for="exampleInputPassword1">Course</label>';
        template += ' <select name="course_' + id_valid + '" class="form-control is-invalid" id="course_' + id_valid +
            '">';
        template += ' <option value="">[No Sub Events]</option>';
        template += '  <option value="ug">UG</option>';
        template += ' <option value="pg">PG</option>';
        template += '  </select>';
        template += ' <span id="course_err_' + id_valid + '" style="color:red"></span>';
        template += ' </div>';
        template += ' </div>';
        template += ' <div class="col-sm-3"></div>';
        template += ' <div class="col-sm-3"></div>';
        template += ' <div class="col-sm-6 del_id_' + id_valid + '">';
        template += ' <div class="form-group">';
        template += ' <label for="exampleInputPassword1">year</label>';
        template += '  <select name="year_' + id_valid + '" class="form-control is-invalid" id="year_' + id_valid +
            '">';
        template +=
            '  <option value="">[No Sub Events]</option> <option value="1">I</option> <option value="2">II</option> <option value="3">III</option>';
        template += ' </select>';
        template += '   <span id="year_err_' + id_valid + '" style="color:red"></span>';
        template += ' </div>';
        template += '  </div> ';
        template += ' <div class="col-sm-3"></div>';
        template += ' <div class="col-sm-3"></div>';
        template += '  <div class="col-sm-6 del_id_' + id_valid +
            '"> <button type="button" style="margin-bottom: 30px;"class="btn btn-danger" id="' + id_valid +
            '"onclick="del_std(' + id_valid +
            ',this.id)">Delete Student</button></div>';
        template += ' <div class="col-sm-3"></div>';
        $("#add-student").append(template);
        localStorage.setItem('id_valid', id_valid);
        // alert( localStorage.getItem('id_valid'))
    }


    function save_event() {
        var i;
        var name = [];
        var reg_no = [];
        var course = [];
        var year = [];
        var valid = localStorage.getItem('id_valid');
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
        if (document.getElementById("event_date").value == '') {
            document.getElementById("event_date_err").innerHTML = 'Please enter the Date';
            document.getElementById("event_date").focus();
            return false;
        } else {
            document.getElementById("event_date_err").innerHTML = '';
        }

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
        //if (parseInt(i) - 1 == parseInt(valid)) {
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
                    //window.location.href = "activity_form.php";
                } else {
                    $("#login_err").html("Email or Password is Incorrect");
                }
            }
        });
        //   }
    }
    </script>

    <script>
    function del_std(id, btn_id) {
        $("div").remove(".del_id_" + btn_id);
        var final = localStorage.getItem('id_valid');
        var new_id;
        for (var j = parseInt(btn_id) + 1; j <= parseInt(final); j++) {
            new_id = j - 1;
            $("#" + j).attr('id', new_id)
            $(".del_id_" + j).find("#std_reg_" + j).attr('id', 'std_reg_' + new_id);
            $(".del_id_" + j).find("#reg_no_err_" + j).attr('id', 'reg_no_err_' + new_id);

            $(".del_id_" + j).find("#std_name_" + j).attr('id', 'std_name_' + new_id);
            $(".del_id_" + j).find("#name_err_" + j).attr('id', 'name_err_' + new_id);

            $(".del_id_" + j).find("#course_" + j).attr('id', 'course_' + new_id);
            $(".del_id_" + j).find("#course_err_" + j).attr('id', 'course_err_' + new_id);

            $(".del_id_" + j).find("#year_" + j).attr('id', 'year_' + new_id);
            $(".del_id_" + j).find("#year_err_" + j).attr('id', 'year_err_' + new_id);

            $(".del_id_" + j).addClass("del_id_" + new_id);
            $(".del_id_" + new_id).removeClass("del_id_" + j);

            $("#std-count" + j).html("Student " + new_id);
        }
        final--;
        localStorage.setItem('id_valid', final);
    }
    </script>

    <script>
    $('#std_reg_1,#std_name_1').keyup(function() {
        if ($(this).val() != '') {
            $(this).removeClass('is-invalid');
            $(this).addClass('is-valid');
        } else {
            $(this).addClass('is-invalid');
            $(this).removeClass('is-valid');
        }

    })

    // $('[id^=std_reg_]').keyup(function() {
    //     if ($(this).val() != '') {
    //         $(this).removeClass('is-invalid');
    //         $(this).addClass('is-valid');
    //     } else {
    //         $(this).addClass('is-invalid');
    //         $(this).removeClass('is-valid');
    //     }

    // })
    $('#event_name,#sub_event_name,#event_date,#course_1,#year_1').change(function() {
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
    </script>