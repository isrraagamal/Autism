<?php 
session_start(); 
if(!isset( $_SESSION["user_id"])){
   header('location: login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/stories.css">
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

    .gifhy-div {
        background-image: url("./images/storyImages/reading4.jpg") !important;
        background-position: center !important;

    }
    </style>

</head>

<body>
    <div class="container-scroller">
        <?php require("includes/body-header.php"); ?>

        <!--*************************************************************** Main *******************************************************-->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <h2 class="mx-3 mb-3 category-title text-right">قصص مُسلسلة</h2>
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0 justify-content-center align-items-center">
                                <div class="gifhy-div">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 row align-items-center my-3 cardsContainer">

                    <!-- MAIN CONTENT -->

                </div>

            </div>

            <?php require("includes/home-footer.php"); ?>
        </div>
    </div>
    <!-- page-body-wrapper ends -->
    </div>

    <script src="js/story.js"></script>
    <?php require("includes/home-scripts.php"); ?>