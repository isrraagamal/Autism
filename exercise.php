<?php
session_start();
if (!isset($_SESSION["user_id"])) {
  header('location: login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
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
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" href="css/exercises.css">
  <style>
    .main-panel {
      position: absolute !important;
      top: 61px;
      right: 0px;
    }
  </style>
</head>

<body>
  <?php require("includes/body-header.php"); ?>
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <h2 class="mx-3 mb-3 category-title">تدريبات</h2>
        <div class="col-md-12 grid-margin">
          <div class="row">
            <div class="col-12 col-xl-8 mb-4 mb-xl-0 justify-content-center align-items-center">
              <div class="gifhy-div">
                <img class="gif" src="./images/giff.gif" alt="" />
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 row align-items-center my-3 exercise-card">
      </div>
    </div>
    <?php require("includes/home-footer.php"); ?>
  </div>
  </div>
  </div>
  <script src="js/exercises.js"></script>
  <?php require("includes/home-scripts.php"); ?>