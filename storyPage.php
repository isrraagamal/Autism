<?php 
session_start(); 
if(!isset( $_SESSION["user_id"])){
   header('location: login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
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
    </head>
  <style>
    .content-wrapper{
      background-color: rgb(235, 235, 255)!important;
    }
    .main-panel {
        position: absolute !important;
        top: 61px;
        right: 0px;
    }
  </style>
<body>
    <?php require("includes/body-header.php"); ?>

    <?php
          $folder=$_GET['src'];
          $folderName=__DIR__."/"."images/stories/$folder";
          $files=[];
          foreach(scandir($folderName) as $file){
            $filename = $file;
            $without_extension = pathinfo($filename, PATHINFO_FILENAME);
            if(is_dir($file)){
                  continue;
              }
            $files[]=$without_extension;
          }
        ?>
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">

            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                <div class="carousel-inner">

                    <?php foreach($files as $f):?>

                    <?php if($f == 1):?>
                    <div class="carousel-item active mx-auto">
                        <img src="images/stories/<?php echo "$folder/$f"?>.png" class="d-block w-50 mx-auto" alt="...">
                    </div>

                    <?php else:?>

                    <div class="carousel-item mx-auto">
                        <img src="images/stories/<?php echo "$folder/$f"?>.png" class="d-block w-50 mx-auto" alt="...">
                    </div>
                    <?php endif?>

                    <?php endforeach?>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span style="background-color:#5E50F9;" class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span style="background-color:#5E50F9;" class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>


            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
        <?php require("includes/home-footer.php"); ?>
    </div>

    </div> <!-- ./container-scroller -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    <?php require("includes/home-scripts.php"); ?>