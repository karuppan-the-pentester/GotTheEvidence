<?php 

session_start();
include '../database.php';
$user_id=$_SESSION['userid'];
  if ($user_id==NULL) {
    header("Location: ./login/");
  }
  $select_data_query = "SELECT * FROM `user_details` WHERE id=" . $user_id;
  $select_data_result = mysqli_query($connection, $select_data_query);
  while ($userrow = mysqli_fetch_assoc($select_data_result)) {
    $name = $userrow["name"];
    $role = $userrow['role'];
  }

  if($role!="admin"){
    header("Location: ../");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../static/vendors/feather/feather.css">
  <link rel="stylesheet" href="../static/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../static/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../static/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="../static/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../static/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../static/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../static/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../static/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../static/images/favicon.png" />
</head>

<body class="sidebar-icon-only">
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="../static/index.html">
          <img src="../static/images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="../static/index.html">
          <img src="../static/images/logo-mini.svg" alt="logo" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?php echo $name;?></span></h1>
          <h3 class="welcome-sub-text">Guru Gayathri Yoga and Naturecure Research Hospital</h3>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
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
          <a class="nav-link count-indicator" id="notificationDropdown" href="../static/#" data-bs-toggle="dropdown">
            <i class="icon-mail icon-lg"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
              <p class="mb-0 font-weight-medium float-left">You have  new notifications </p>
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
          <a class="nav-link count-indicator" id="countDropdown" href="../static/#" data-bs-toggle="dropdown" aria-expanded="false">
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
                <img src="../static/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="../static/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="../static/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
          </div>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="../static/#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="../static/images/faces/face8.jpg" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="../static/images/faces/face8.jpg" alt="Profile image">
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
          <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="../static/#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="../static/#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
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
              <div class="profile"><img src="../static/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Thomas Douglas</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">19 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="../static/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
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
              <div class="profile"><img src="../static/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Daniel Russell</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">14 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="../static/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
              <div class="info">
                <p>James Richardson</p>
                <p>Away</p>
              </div>
              <small class="text-muted my-auto">2 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="../static/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
              <div class="info">
                <p>Madeline Kennedy</p>
                <p>Available</p>
              </div>
              <small class="text-muted my-auto">5 min</small>
            </li>
            <li class="list">
              <div class="profile"><img src="../static/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
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
          <a class="nav-link" href="../static/index.html">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item nav-category">Module</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="../static/#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="menu-icon mdi mdi mdi-loupe "></i>
            <span class="menu-title">Registration Module</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../static/modules/registration-module/inpatient/">Incoming Patient</a></li>
              <li class="nav-item"> <a class="nav-link" href="../static/modules/registration-module/outpatient/">Outgoing Patient</a></li>
              <li class="nav-item"> <a class="nav-link" href="../static/modules/room-allocation-module/">Ward Allocation</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="../static/#form-elements" aria-expanded="false" aria-controls="form-elements">
            <i class="menu-icon mdi mdi-card-text-outline"></i>
            <span class="menu-title">Billing Module</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="form-elements">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="../static/pages/forms/basic_elements.html">O/P Billing</a></li>
              <li class="nav-item"><a class="nav-link" href="../static/pages/forms/basic_elements.html">I/P Billing</a></li>
              <li class="nav-item"><a class="nav-link" href="../static/pages/forms/basic_elements.html">Ward Billing</a></li>
              <li class="nav-item"><a class="nav-link" href="../static/pages/forms/basic_elements.html">Pharmacy Billing</a></li>

            </ul>
          </div>
        </li>
        <li class="nav-item nav-category">Enquiry Module</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="../static/#charts" aria-expanded="false" aria-controls="charts">
            <i class="menu-icon  mdi mdi-comment-question-outline "></i>
            <span class="menu-title">Overall Enquiry</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../static/modules/registration-module/inpatient/">Ward Enquiry</a></li>
              <li class="nav-item"> <a class="nav-link" href="../static/modules/registration-module/outpatient/">Treatment Enquiry</a></li>
              <li class="nav-item"> <a class="nav-link" href="../static/modules/room-allocation-module/">Pharmacy Enquiry</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item nav-category">Staff Module</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="../static/#tables" aria-expanded="false" aria-controls="tables">
            <i class="menu-icon mdi mdi-account-card-details "></i>
            <span class="menu-title">Staff Module</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../static/modules/registration-module/inpatient/">Staff Attendance</a></li>
              <li class="nav-item"> <a class="nav-link" href="../static/modules/registration-module/outpatient/">Staff Data</a></li>
              <li class="nav-item"> <a class="nav-link" href="../static/modules/room-allocation-module/">Forms</a></li>
            </ul>
          </div>
        </li>
        <!--
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="../static/#tables" aria-expanded="false" aria-controls="tables">
            <i class="menu-icon mdi mdi-table"></i>
            <span class="menu-title">Tables</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../static/pages/tables/basic-table.html">Basic table</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="../static/#icons" aria-expanded="false" aria-controls="icons">
            <i class="menu-icon mdi mdi-layers-outline"></i>
            <span class="menu-title">Icons</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="icons">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../static/pages/icons/mdi.html">Mdi icons</a></li>
            </ul>
          </div>
        </li> -->
        <!-- <li class="nav-item nav-category">pages</li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="../static/#auth" aria-expanded="false" aria-controls="auth">
            <i class="menu-icon mdi mdi-account-circle-outline"></i>
            <span class="menu-title">User Pages</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../static/pages/samples/login.html"> Login </a></li>
            </ul>
          </div>
        </li> -->
        <!-- <li class="nav-item nav-category">help</li>
        <li class="nav-item">
          <a class="nav-link" href="../static/http://bootstrapdash.com/demo/star-admin2-free/docs/documentation.html">
            <i class="menu-icon mdi mdi-file-document"></i>
            <span class="menu-title">Documentation</span>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="statistics-details d-flex align-items-center justify-content-between">
                        <div>
                          <p class="statistics-title">Incomping Patient</p>
                          <h3 class="rate-percentage">0</h3>
                        </div>
                        <div>
                          <p class="statistics-title">Outgoing Patient</p>
                          <h3 class="rate-percentage">0</h3>
                        </div>
                        <div>
                          <p class="statistics-title">Today Revenue</p>
                          <h3 class="rate-percentage">0</h3>
                        </div>
                        <div class="d-none d-md-block">
                          <p class="statistics-title">Rooms availability</p>
                          <h3 class="rate-percentage">0</h3>
                        </div>
                        <div class="d-none d-md-block">
                          <p class="statistics-title">Active Clients</p>
                          <h3 class="rate-percentage">0</h3>
                        </div>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">
                    <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Doctor Data</h4>
                                </div>
                                <div>
                                  <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                </div>
                              </div>
                              <div class="table-responsive  mt-1">
                                <table class="table select-table">
                                  <thead>
                                    <tr>
                                      <th>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </th>
                                      <th>Name</th>
                                      <th>Designation</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="../static/http://big-boy.me/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Destro Sec</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>System Admin</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">Working</div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column">
                      
                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                          <div class="card bg-primary card-rounded">
                            <div class="card-body pb-0">
                              <h4 class="card-title card-title-dash text-white mb-4">Status Summary</h4>
                              <div class="row">
                                <div class="col-sm-4">
                                  <p class="status-summary-ight-white mb-1">Closed Value</p>
                                  <h2 class="text-info">357</h2>
                                </div>
                                <div class="col-sm-8">
                                  <div class="status-summary-chart-wrapper pb-4">
                                    <canvas id="status-summary"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-sm-6">
                                  <div class="d-flex justify-content-between align-items-center mb-2 mb-sm-0">
                                    <div class="circle-progress-width">
                                      <div id="totalVisitors" class="progressbar-js-circle pr-2"></div>
                                    </div>
                                    <div>
                                      <p class="text-small mb-2">Total Visitors</p>
                                      <h4 class="mb-0 fw-bold">26.80%</h4>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="circle-progress-width">
                                      <div id="visitperday" class="progressbar-js-circle pr-2"></div>
                                    </div>
                                    <div>
                                      <p class="text-small mb-2">Visits per day</p>
                                      <h4 class="mb-0 fw-bold">9065</h4>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title card-title-dash">Todo list</h4>
                                    <div class="add-items d-flex mb-0">
                                      <!-- <input type="text" class="form-control todo-list-input" placeholder="What do you need to do today?"> -->
                                      <button class="add btn btn-icons btn-rounded btn-primary todo-list-add-btn text-white me-0 pl-12p"><i class="mdi mdi-plus"></i></button>
                                    </div>
                                  </div>
                                  <div class="list-wrapper">
                                    <ul class="todo-list todo-list-rounded">
                                      <li class="d-block">
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3">24 June 2020</div>
                                            <div class="badge badge-opacity-warning me-3">Due tomorrow</div>
                                            <i class="mdi mdi-flag ms-2 flag-color"></i>
                                          </div>
                                        </div>
                                      </li>
                                      <li class="d-block">
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3">23 June 2020</div>
                                            <div class="badge badge-opacity-success me-3">Done</div>
                                          </div>
                                        </div>
                                      </li>
                                      <li>
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3">24 June 2020</div>
                                            <div class="badge badge-opacity-success me-3">Done</div>
                                          </div>
                                        </div>
                                      </li>
                                      <li class="border-bottom-0">
                                        <div class="form-check w-100">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox"> Lorem Ipsum is simply dummy text of the printing <i class="input-helper rounded"></i>
                                          </label>
                                          <div class="d-flex mt-2">
                                            <div class="ps-4 text-small me-3">24 June 2020</div>
                                            <div class="badge badge-opacity-danger me-3">Expired</div>
                                          </div>
                                        </div>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">
                      
                    </div>
                    <div class="col-lg-4 d-flex flex-column">
                      <div class="row flex-grow">
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Developed By <a href="../static/https://www.github.com/destro-sec" target="_blank">Destro-Sec</a> </span>
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
  <script src="../static/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../static/vendors/chart.js/Chart.min.js"></script>
  <script src="../static/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="../static/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../static/js/off-canvas.js"></script>
  <script src="../static/js/hoverable-collapse.js"></script>
  <script src="../static/js/template.js"></script>
  <script src="../static/js/settings.js"></script>
  <script src="../static/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../static/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="../static/js/dashboard.js"></script>
  <script src="../static/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>