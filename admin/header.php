<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Fine Arts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../assets/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="../assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="../assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
        background-color: #000000 !important;
    }

    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active {
        background-color: rgb(18, 36, 56);
        color: #ffffff;
    }

    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
        color: white;
    }

    :not(.layout-fixed) .main-sidebar {
        background: #283655;
    }
    body{
        background-color : white;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="#" class="d-block">Fine Arts</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview">
                            <a href="dashboard.php" class="nav-link">
                                <i class="nav-icon fa fa-bar-chart"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas "></i>
                                </p>
                            </a>

                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Student Event List
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="activity_form_list.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Activity Form List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="selection_form.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Selection Form List</p>
                                    </a>
                                </li>
                                  <li class="nav-item">
                                    <a href="post_activity_form_list.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Post Activity Form</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Coordinators
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-edit-coordinator.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-coordinators.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Events
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-edit-events.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-events.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Sub Events
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-edit-sub-event.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-sub-event.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Levels
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="add-edit.levels.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="view-levels.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>View</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cubes"></i>
                                <p>
                                    Report Generate
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="report.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Get Report</p>
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item has-treeview">
                            <a href="javascript:void(0)" id="logout" class="nav-link">
                                <i class="nav-icon fa fa fa-sign-out""></i>
                                <p>
                                    Logout
                                    <i class="right fas "></i>
                                </p>
                            </a>

                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>