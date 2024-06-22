<?php

session_start();
include './database.php';
$user_id = $_SESSION['userid'];
if ($user_id == NULL) {
  header("Location: ./login/");
}
$select_data_query = "SELECT * FROM `user_details` WHERE id=" . $user_id;
$select_data_result = mysqli_query($connection, $select_data_query);
while ($userrow = mysqli_fetch_assoc($select_data_result)) {
  $name = $userrow["name"];
  $mail = $userrow["mail"];
  $role = $userrow["role"];
}

if ($role == "admin") {
  header("Location: ./admin");
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
  <link rel="stylesheet" href="./static/vendors/feather/feather.css">
  <link rel="stylesheet" href="./static/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./static/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="./static/vendors/typicons/typicons.css">
  <link rel="stylesheet" href="./static/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="./static/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./static/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="./static/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./static/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="./static/images/favicon.png" />
</head>

<body class="sidebar-icon-only" style="background-color: #F4F5F7;">
  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">

    <div class="navbar-menu-wrapper d-flex align-items-top">
      <ul class="navbar-nav">
        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
          <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?php echo $name; ?></span></h1>
          <h3 class="welcome-sub-text">Tech Support Engineer</h3>
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
          <a class="nav-link count-indicator" id="notificationDropdown" href="./static/#" data-bs-toggle="dropdown">
            <i class="icon-mail icon-lg"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
              <p class="mb-0 font-weight-medium float-left">You have 2 new notifications </p>
              <span class="badge badge-pill badge-primary float-right">View all</span>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-alert m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">Application Error </h6>
                <p class="fw-light small-text mb-0"> Just now </p>
              </div>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-settings m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">Check Folder Permission</h6>
                <p class="fw-light small-text mb-0"> Private message </p>
              </div>
            </a>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="countDropdown" href="./static/#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="icon-bell"></i>
            <span class="count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
            <a class="dropdown-item py-3">
              <p class="mb-0 font-weight-medium float-left">You have 2 unread mails </p>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="./static/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">Jonathan James </p>
                <p class="fw-light small-text mb-0"> Check To-Do </p>
              </div>
            </a>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="./static/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                <p class="fw-light small-text mb-0"> Admin Login Working! </p>
              </div>
            </a>

          </div>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="./static/#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="./static/images/faces/face8.jpg" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="./static/images/faces/face8.jpg" alt="Profile image">
              <p class="mb-1 mt-3 font-weight-semibold"><?php echo $name; ?></p>
              <p class="fw-light text-muted mb-0"><?php echo $mail; ?></p>
            </div>
            <!-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a> -->
            <a class="dropdown-item" href="./logout/"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
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
                                  <h4 class="card-title card-title-dash">Request Data</h4>
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
                                      <th>Problem</th>
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
                                          <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="">
                                          <div>
                                            <h6>James William</h6>
                                            <p>Research Lab</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>AC Not Working</h6>
                                        <p>Mechanical</p>
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
                                          <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="">
                                          <div>
                                            <h6>David Grey</h6>
                                            <p>IT Department</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>Admin Login Not Working</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-success">Finished</div>
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
                                          <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="">
                                          <div>
                                            <h6>William Wilson</h6>
                                            <p>Content Writer</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>File Upload Not Working in blogger</h6>
                                        <p>IT Wing</p>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-success">Finished</div>
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
                                          <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="">
                                          <div>
                                            <h6>James Jonathan</h6>
                                            <p>Tech Officer</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>Delete old Files From /trash</h6>
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
                                          <img src="https://karuppan-the-pentester.github.io/images/user-3.jpg" alt="">
                                          <div>
                                            <h6>Karthik Raja</h6>
                                            <p>Tech Officer</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>CSRF Token Not Working</h6>
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
                                          <img src="https://cdn-icons-png.flaticon.com/512/5556/5556468.png" alt="">
                                          <div>
                                            <h6>Mikel Mike</h6>
                                            <p>Research Engineer</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>Images is showing in comments of Blogger</h6>
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
                                    <p class="text-small mb-2">Total Request</p>
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
                                    <p class="text-small mb-2">Requests per day</p>
                                    <h4 class="mb-0 fw-bold">65</h4>
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
                                    <li class="d-block completed">
                                      <div class="form-check w-100">
                                        <label class="form-check-label">
                                          <input class="checkbox" type="checkbox" checked="checked"> Send the Umbrella Sensitive data to David Grey <i class="input-helper rounded"></i>
                                        </label>
                                        <div class="d-flex mt-2">
                                          <div class="ps-4 text-small me-3">22 June 2024</div>
                                          <div class="badge badge-opacity-success me-3">Done</div>
                                        </div>
                                      </div>
                                    </li>
                                    <li class="d-block">
                                      <div class="form-check w-100">
                                        <label class="form-check-label">
                                          <input class="checkbox" type="checkbox"> Check Blog (Admin Order) <i class="input-helper rounded"></i>
                                        </label>
                                        <div class="d-flex mt-2">
                                          <div class="ps-4 text-small me-3">Daily</div>
                                          <div class="badge badge-opacity-warning me-3">Today</div>
                                          <i class="mdi mdi-flag ms-2 flag-color"></i>
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
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Developed By <a href="https://www.github.com/destro-sec" target="_blank">Destro-Sec</a> </span>
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
  <script src="./static/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="./static/vendors/chart.js/Chart.min.js"></script>
  <script src="./static/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="./static/vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="./static/js/off-canvas.js"></script>
  <script src="./static/js/hoverable-collapse.js"></script>
  <script src="./static/js/template.js"></script>
  <script src="./static/js/settings.js"></script>
  <script src="./static/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="./static/js/jquery.cookie.js" type="text/javascript"></script>
  <script src="./static/js/dashboard.js"></script>
  <script src="./static/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>