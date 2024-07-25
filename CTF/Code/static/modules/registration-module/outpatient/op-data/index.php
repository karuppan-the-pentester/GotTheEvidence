<?php
include '../../../../db.php';
$Selcet_Data = "SELECT DISTINCT `regdate` FROM `op-data` ORDER BY `regdate` DESC;";
$Selcet_Result = mysqli_query($connection, $Selcet_Data);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../../../vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../../../css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../../../images/favicon.png" />
</head>

<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
            </div>
            <div>
                <a class="navbar-brand brand-logo" href="../../../../index.html">
                    <img src="../../../../images/logo.svg" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="../../../../index.html">
                    <img src="../../../../images/logo-mini.svg" alt="logo" />
                </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
            <ul class="navbar-nav">
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Welcome, <span class="text-black fw-bold">Doctor </span></h1>
                    <h3 class="welcome-sub-text">Guru Gayathri Yoga and Naturecure Research Hospital</h3>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li>
                    <a href="../">
                        <i class=" mdi mdi-pencil-box-outline " style="font-size:2rem;padding:10px;"></i>
                    </a>
                </li>
                <li class="nav-item d-none d-lg-block">
                    <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
                        <span class="input-group-addon input-group-prepend border-right">
                            <span class="icon-calendar input-group-text calendar-icon"></span>
                        </span>
                        <input type="text" class="form-control">
                    </div>
                </li>
                <li class="nav-item">
                    <form class="search-form" action="#">
                        <i class="icon-search"></i>
                        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                    </form>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="notificationDropdown" href="../../../../#" data-bs-toggle="dropdown">
                        <i class="icon-mail icon-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item py-3 border-bottom">
                            <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                            <span class="badge badge-pill badge-primary float-right">View all</span>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-alert m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                                <p class="fw-light small-text mb-0"> Just now </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-settings m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                                <p class="fw-light small-text mb-0"> Private message </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item py-3">
                            <div class="preview-thumbnail">
                                <i class="mdi mdi-airballoon m-auto text-primary"></i>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                                <p class="fw-light small-text mb-0"> 2 days ago </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="countDropdown" href="../../../../#" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="icon-bell"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                        <a class="dropdown-item py-3">
                            <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                            <span class="badge badge-pill badge-primary float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../../../images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../../../images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="../../../../images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="../../../../#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="img-xs rounded-circle" src="../../../../images/faces/face8.jpg" alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">
                            <img class="img-md rounded-circle" src="../../../../images/faces/face8.jpg" alt="Profile image">
                            <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                            <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                        </div>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                        <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="../../../../#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="../../../../#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Resolve all the low priority tickets due today
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Schedule meeting for next week
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary me-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                        <p class="text-gray mb-0">The total number of sessions</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary me-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                        <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                </div>
                <!-- To do section tab ends -->
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="../../../../images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../../images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../../images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../../images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../../images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="../../../../images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="../../../../index.php">
                        <i class="mdi mdi-grid-large menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item nav-category">Module</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="../../../../#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon mdi mdi mdi-loupe "></i>
                        <span class="menu-title">Registration Module</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/registration-module/inpatient/">Incoming Patient</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/registration-module/outpatient/">Outgoing Patient</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/room-allocation-module/">Ward Allocation</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="../../../../#form-elements" aria-expanded="false" aria-controls="form-elements">
                        <i class="menu-icon mdi mdi-card-text-outline"></i>
                        <span class="menu-title">Billing Module</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="../../../../pages/forms/basic_elements.html">O/P Billing</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../../pages/forms/basic_elements.html">I/P Billing</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../../pages/forms/basic_elements.html">Ward Billing</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../../pages/forms/basic_elements.html">Pharmacy Billing</a></li>

                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">Enquiry Module</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="../../../../#charts" aria-expanded="false" aria-controls="charts">
                        <i class="menu-icon  mdi mdi-comment-question-outline "></i>
                        <span class="menu-title">Overall Enquiry</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/registration-module/inpatient/">Ward Enquiry</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/registration-module/outpatient/">Treatment Enquiry</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/room-allocation-module/">Pharmacy Enquiry</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item nav-category">Staff Module</li>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="../../../../#tables" aria-expanded="false" aria-controls="tables">
                        <i class="menu-icon mdi mdi-account-card-details "></i>
                        <span class="menu-title">Staff Module</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="tables">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/registration-module/inpatient/">Staff Attendance</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/registration-module/outpatient/">Staff Data</a></li>
                            <li class="nav-item"> <a class="nav-link" href="../../../../modules/room-allocation-module/">Forms</a></li>
                        </ul>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- partial -->
        <div class='main-panel'>
            <div class='content-wrapper'>
                <?php
                while ($datarow = mysqli_fetch_assoc($Selcet_Result)) {
                    $date = $datarow['regdate'];
                    echo "
                <div class='row'>
                    <div class='col-sm-12'>
                        <div class='home-tab'>
                            <div class='d-sm-flex align-items-center justify-content-between border-bottom'>
                                <h4 class='card-title'>OutPatient Data Record</h4>
                                <div>
                                    <div class='btn-wrapper'>
                                        <a href='../#' class='btn btn-otline-dark align-items-center'><i class='icon-share'></i> Share</a>
                                        <a href='../#' class='btn btn-otline-dark'><i class='icon-printer'></i> Print</a>
                                        <a href='../#' class='btn btn-primary text-white me-0'><i class='icon-download'></i> Export</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class='col-lg-12 grid-margin stretch-card'>
                    <div class='card'>
                        <div class='card-body'>
                            <h3 class='card-title'>" . $date . " </h3>
                            <div class='table-responsive'>
                                <table class='table table-hover'>
                                    <thead>
                                        <tr>
                                            <th>Registered Time </th>
                                            <th>Name</th>
                                            <th>Reason</th>
                                            <th>Navigated</th>
                                            <th>Fees</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        " ?>
                    <?php
                    $inst_data = "SELECT * FROM `op-data` WHERE `regdate`='$date' ORDER BY `regtime` DESC;  ";
                    $Selceet_Result = mysqli_query($connection, $inst_data);
                    while ($w = mysqli_fetch_assoc($Selceet_Result)) {
                        $id = $w['id'];
                        $name = $w['name'];
                        $navigated = $w['drname'];
                        $regtime = $w['regtime'];
                        $reason = $w['reason'];
                        $fee = $w['fee'];

                        echo "<tr class='clickable-row' data-href='./enquiry/index.php?user=" . $id . "'>
                        
                                                <td>" . $regtime . "</td>
                                                <td>" . $name . "</td>
                                                <td>" . $reason . "</td>
                                                <td>" . $navigated . "</td>
                                                <td>Rs. " . $fee . "</td>           
                             </tr> 
                                            ";
                    }
                    ?>
                <?php
                    $inst__Data = "SELECT SUM(`fee`) FROM `op-data` WHERE `regdate`='$date' ORDER BY `regtime` DESC; ";
                    $Selet_Result = mysqli_query($connection, $inst__Data);
                    while ($wr = mysqli_fetch_assoc($Selet_Result)) {
                        $tfee = $wr['SUM(`fee`)'];
                        echo "<tr>
                                <th>Total</th>
                                <td>Rs. $tfee</td>
                        </tr>";
                    }
                    echo "
                    </thead>
                </table>
            </div>
        </div>
        </div>
        </div>";
                }
                ?>

            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Developed by <a href="https://www.github.com/destro-sec" target="_blank">Destro-Sec</a> </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022. All rights reserved.</span>
        </div>
    </footer>
    <!-- partial -->
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../../../../vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../../../vendors/chart.js/Chart.min.js"></script>
    <script src="../../../../vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../../../vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../../../js/off-canvas.js"></script>
    <script src="../../../../js/hoverable-collapse.js"></script>
    <script src="../../../../js/template.js"></script>
    <script src="../../../../js/settings.js"></script>
    <script src="../../../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../../../js/jquery.cookie.js" type="text/javascript"></script>
    <script src="../../../../js/dashboard.js"></script>
    <script src="../../../../js/Chart.roundedBarCharts.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <!-- End custom js for this page-->
</body>

</html>