<?php session_start();

//  if(!isset( $_SESSION["user_id"])){
//    header('location: login.php');
//  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Autism</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="css/dashboard.css">
  <link rel="stylesheet" href="all.min.css">
</head>

<body class="homeBg">
  <div class="container-scroller">
    <?php require("includes/body-header.php"); ?>


    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <?php if (isset($_SESSION['user_fname'])): ?>
                  <h3 class="font-weight-bold"> Admin ،مرحبا</h3>
                <?php endif ?>
                <h6 class="font-weight-normal mb-4">تسعدنا عودتك من جديد <span class="text-primary">!</span></h6>
              </div>
              <div class="col-12 col-xl-4">
                <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="mdi mdi-calendar"></i>
                      <?php
                      $currentDate = date('Y-m-d'); // will return date in yyyy-mm-dd format
                      echo $currentDate;
                      ?>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 grid-margin transparent">
            <div class="row">
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale">
                  <a href="categories2.php" style="color:white; text-decoration:none;">
                    <div class="card-body text-right">
                      <h3 class="my-4">تعلم النطق</h3>
                      <p class="fs-30 mb-2">19</p>
                      <div class="dash-icons">
                        <div>
                          <a href="dashboard_add.php">
                            <span>Add</span>
                            <i class="fa-solid fa-circle-plus"></i>
                          </a>
                        </div>
                        <div>
                          <a href="categories2.php">
                            <span>Delete</span>
                            <i class="fa-solid fa-circle-minus"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-dark-blue">
                  <a style="color:white; text-decoration:none;" href="exercise.php">
                    <div class="card-body text-right">
                      <h3 class="my-4">تدريبات</h3>
                      <p class="fs-30 mb-2">19</p>
                    </div>
                  </a>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                <div class="card card-light-blue pb-5">
                  <a style="color:white; text-decoration:none;" href="video.php">
                    <div class="card-body text-right">
                      <h3 class="my-4"> فيديوهات توعية</h3>
                      <p class="fs-30 mb-2">10</p>
                    </div>
                  </a>
                </div>
              </div>

              <div class="col-md-6 stretch-card transparent">
                <div class="card card-light-danger">
                  <a style="color:white; text-decoration:none;" href="stories.php">
                    <div class="card-body text-right">
                      <h3 class="my-4"> قصص مُسلسلة</h3>
                      <p class="fs-30 mb-2">20</p>
                    </div>
                </div> -->
              </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- ./row -->
    <img class="pt-5" src="./images/45.png" alt="" srcset="" width=500px style="position:absolute; right:3%;top:5%">
  </div>

  <?php require("includes/home-footer.php"); ?>

  </div>

  </div>

  <?php require("includes/home-scripts.php"); ?>