<?php session_start(); 
 
if(!isset( $_SESSION["user_id"])){
  header('location: login.php');
} 

require("config/database.php");
require("classes/user.php");

$user = new user($pdo);

if(isset($_SESSION["user_id"]) && isset($_POST["edit"])){

    $id = $_SESSION["user_id"];
    $firstName = $_POST["fName"];
    $lastName = $_POST["lName"];
    $email = $_POST["email"];
    $password = $_POST["password1"];
    $repassword = $_POST["password2"];

    $result = $user->update($firstName, $lastName, $email, $password, $repassword, $id);

    if($result !== true){
        $errors = $result;
    }
}


?>
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

    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <style>
    .container-fluid {
        padding: 0px !important;
    }

    .main-panel {
        position: absolute !important;
        top: 61px;
        right: 0px;
    }
    .img-profile{
        border-radius: 50%;
    }
  
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->


        <?php require("includes/body-header.php"); ?>


        <!-- ******************************main**************************** -->
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="container profile-content">
                    <h1 class="text-center mb-3">الصفحة الشخصية</h1>
                
                    <div class="row d-flex justify-content-around">
                    <div class="cover col-4">
                            <div><img width="100%" class="img-profile" src="./images/faces/face28.jpg"/></div>

                        </div>
                        <div class="data col-8 my-5 col-md-11 col-lg-8 col-xl-7">
                            <div class="box">
                                <div class="icon">

                                </div>
                                <div>
                                    <h5>الاسم الأول</h5>
                                    <?php if(isset($_SESSION["user_fname"])): ?>
                                    <h6><?= $_SESSION["user_fname"] ?></h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="box">
                                <div class="icon">

                                </div>
                                <div>
                                    <h5>اسم العائلة</h5>
                                    <?php if(isset($_SESSION["user_lname"])): ?>
                                    <h6><?= $_SESSION["user_lname"] ?></h6>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="box">
                                <div class="icon">

                                </div>
                                <div>
                                    <h5>البريد الإلكتروني</h5>
                                    <?php if(isset($_SESSION["user_email"])): ?>
                                    <h6><?= $_SESSION["user_email"] ?></h6>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- validation -->
                            <?php if(isset($errors["invalid-email"])): ?>
                            <h6 class="mt-1 text-danger text-left"><?= $errors["invalid-email"] ?></h6>
                            <?php endif; ?>
                            <?php if(isset($errors["exist-email"])): ?>
                            <h6 class="mt-1 text-danger text-left"><?= $errors["exist-email"] ?></h6>
                            <?php endif; ?>

                            <div class="box">
                                <div class="icon">

                                </div>
                                <div>
                                    <h5>كلمة السر</h5>
                                    <?php if(isset($_SESSION["user_password"])): ?>
                                    <h6>*****</h6>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <?php if(isset($errors["repassword"])): ?>
                            <h6 class="mt-1 text-danger text-left"><?= $errors["repassword"] ?></h6>
                            <?php endif; ?>

                        </div> <!-- ./col -->

                        <div class="editForm my-5 pt-5 col-md-11 col-lg-8 col-xl-7">
                            <form action="" method="POST">
                                <h5 class="pb-3 edit-title"></h5>

                                <input type="text" class="edit" name="fName" data-name="الاسم الأول"
                                    placeholder="الاسم الأول" value="<?= $_SESSION["user_fname"]?>">
                                <input type="text" class="edit" name="lName" data-name="اسم العائلة"
                                    placeholder="اسم العائلة" value="<?= $_SESSION["user_lname"]?>">
                                <input type="text" class="edit" name="email" data-name="البريد الإلكتروني"
                                    placeholder="البريد الإلكتروني" value="<?= $_SESSION["user_email"]?>">
                                <input type="password" class="edit" name="password1" data-name="كلمة السر"
                                    placeholder=" كلمة السر الجديدة">
                                <input type="password" class="edit" name="password2" data-name="كلمة السر"
                                    placeholder="إعادة كلمة السر">

                                <input type="reset" value="إلغاء" id="cancelBtn">
                                <input type="submit" value="حفظ" id="saveBtn" class="ml-md-2" name="edit">
                            </form>
                        </div>
                    </div> <!-- ./row -->
                </div> <!-- ./container -->

                <!-- **************************************************** -->

            </div>
            <!-- main-panel ends -->
            <?php require("includes/home-footer.php"); ?>
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->


    <script src="js/profile.js"></script>
    <?php require("includes/home-scripts.php"); ?>