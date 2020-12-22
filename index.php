<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fine Arts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="assets/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="javascript:void(0);"> <b> Coordinator</b></a>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in </p>
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class=""></span>
                            </div>
                        </div>

                    </div>
                    <span id="email_err" style="color:red"></span>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class=""></span>
                            </div>
                        </div>

                    </div>
                    <span id="password_err" style="color:red"></span>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="button" onclick="return login()" class="btn btn-primary btn-block">Sign
                                In</button>
                                <span id="login_err" style="color: red"></span>
                        </div>
                        <!-- /.col -->
                        
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/dist/js/adminlte.min.js"></script>

</body>

</html>
<script>
function login() {
    var email_regex =
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var valid = 0;
    if ($('#email').val() == '') {
        $('#email_err').text('Please enter email');
        $('#email').css('border-color', 'red');
        $("#email").focus();
        return false;
    } else if (!email_regex.test($('#email').val())) {
        $('#email_err').text('Please enter valid email');
        $('#email').css('border-color', 'red');
        $("#email").focus();
        return false;
    } else {
        $('#email').css('border-color', 'green');
        $('#email_err').text('');
        valid++;
    }
    if ($('#password').val() == '') {
        $('#password_err').text('Please enter password');
        $('#password').css('border-color', 'red');
        $("#password").focus();
        return false;
    } else {
        $('#password').css('border-color', 'green');
        $('#password_err').text('');
        valid++;
    }

    if (valid == 2) {
        var data = new FormData();
        data.append("email", $("#email").val());
        data.append("password", $("#password").val());
        data.append("role", "coordinator");

        $.ajax({
            type: "POST",
            async: false,
            url: 'comman/api.php?action=login',
            data: data,
            cache: false,
            processData: false, // important
            contentType: false,
            success: function(result) {
                var response = JSON.parse(result)
                if (response.status == 'success') {
                    // $("#alert").show();
                    // setInterval(function() {
                    //     $("#alert").hide();
                    // }, 3000);
                    window.location.href = "dashboard.php"
                }
                else{
                    $("#login_err").html("Email or Password is Incorrect");
                }
            }
        });
    }
}
</script>