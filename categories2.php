<?php 
session_start(); 
if(!isset( $_SESSION["user_id"])){
   header('location: login.php');
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/categories.css">
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
  <style>
      .main-panel {
        position: absolute !important;
        top: 61px;
        right: 0px;
    }
  </style>
</head>
<body>
  <div class="container-scroller">    
    <?php require("includes/body-header.php"); ?>

      <!--*************************************************************** Main *******************************************************-->
      <div class="main-panel">
        <div class="content-wrapper">
        <section class="ctg">
        <div class="container py-1 my-1">
            <div class="div-btn pb-5">
            
            </div>
            <div class="row categories-row">
                
            </div> <!-- ./row -->
        </div> <!-- ./container -->
        </section>

        </div>
<!-- ********************************************************************************************************* -->
<!-- partial -->
<!-- main-panel ends -->

<?php require("includes/home-footer.php"); ?>
</div>
</div>   
<!-- page-body-wrapper ends -->
</div>

<script src="js/categories.js"></script>
<?php require("includes/home-scripts.php"); ?>

