<?php session_start();

require("config/database.php");
require("classes/categories.php");

$categoriess = array(
  array("arabic_name" => "حيوانات", "english_name" => "animals"),
  array("arabic_name" => "طيور", "english_name" => "birds"),
  array("arabic_name" => "وظائف", "english_name" => "jobs"),
  array("arabic_name" => "ارقام", "english_name" => "numbers"),
  array("arabic_name" => "حضروات", "english_name" => "vegetables"),
  array("arabic_name" => "طعام", "english_name" => "food"),
  array("arabic_name" => "فواكه", "english_name" => "fruits"),
  array("arabic_name" => "زواحف", "english_name" => "reptile"),
  array("arabic_name" => "ملابس", "english_name" => "clothes"),
  array("arabic_name" => "حشرات", "english_name" => "insects"),
  array("arabic_name" => "الوان", "english_name" => "colors"),
  array("arabic_name" => "افعال", "english_name" => "verbs"),
  array("arabic_name" => "اشكال هندسية", "english_name" => "shapes"),
  array("arabic_name" => "ظواهر طبيعية", "english_name" => "naturalphenomena"),
  array("arabic_name" => "حيوانات بحرية", "english_name" => "seaanimals"),
  array("arabic_name" => "وسائل مواصلات", "english_name" => "transport"),
  array("arabic_name" => "اجزاء الجسم", "english_name" => "body"),
  array("arabic_name" => "ادوات شخصية", "english_name" => "personalTools"),
  array("arabic_name" => "ادوات المنزل", "english_name" => "homeTools"),
);

$option = new categories($pdo);



if ($_POST && isset($_POST["submit"])) {

  if (isset($_POST["select-file"])) {
    foreach ($categoriess as $selected) {
      if ($selected["arabic_name"] == $_POST["select-file"]) {
        $categoryOption = $selected['english_name'];
      }
    }
  }
  $title = $_POST["title"];
  if (@$success !== '' && isset($success)) {
    $options = $option->add_file($categoryOption, $title);
    $latest_id = $option->back($categoryOption);
    print_r($latest_id);

  }

  @$error1 = '';
  @$error2 = '';
  @$success = '';
  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file = $_FILES['image'];

    $f_name = $file['name'];
    $f_type = $file['type'];
    $f_tmp_name = $file['tmp_name'];
    $f_error = $file['error'];
    $f_size = $file['size'];

    if ($f_name != '') {
      $ext = pathinfo($f_name);

      $original_name = $ext['filename'];
      $original_ext = $ext['extension'];

      $allowed = array("png");
      if (in_array($original_ext, $allowed)) {
        if ($f_error === 0) {
          $new_name = $latest_id . "." . $original_ext;
          $destnotion = "categories-imgs/$categoryOption/" . $new_name;

          move_uploaded_file($f_tmp_name, $destnotion);
          $success = "تمت الإضافة بنجاح!";
        } else {
          $error1 = "هناك خطأ";

        }
      } else {
        $error1 = "من فضلك ادخل صورة";


      }
    } else {
      $error1 = "ادخل png فقط";

    }

  }

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $file = $_FILES['speech'];

    $f_name = $file['name'];
    $f_type = $file['type'];
    $f_tmp_name = $file['tmp_name'];
    $f_error = $file['error'];
    $f_size = $file['size'];

    if ($f_name != '') {
      $ext = pathinfo($f_name);

      $original_name = $ext['filename'];
      $original_ext = $ext['extension'];

      $allowed = array("ogg");
      if (in_array($original_ext, $allowed)) {
        if ($f_error === 0) {
          $new_name = $latest_id . "." . $original_ext;
          $destnotion = "speech/$categoryOption/" . $new_name;

          move_uploaded_file($f_tmp_name, $destnotion);
          $success = "تم ارفاقه بنجاح";
        } else {
          $error2 = "هناك خطأ";
        }
      } else {
        $error2 = "فقط ogg";
      }
    } else {
      $error2 = "من فضلك ادخل صوت";
    }
  }
  $_POST["title"] = "";
  $_POST["select-file"] = "";
  $_POST["submit"] = "";
}


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
  <link rel="stylesheet" href="css/dashboard_ad.css">
  <link rel="stylesheet" href="all.min.css">
</head>

<body class="homeBg">
  <div class="container-scroller">
    <?php require("includes/body-header.php"); ?>


    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="row">
              <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <?php if (isset($_SESSION['user_fname'])): ?>
                  <h3 class="font-weight-bold"> Admin ،مرحبا</h3>
                <?php endif ?>
                <h6 class="font-weight-normal mb-0">تسعدنا عودتك من جديد <span class="text-primary">!</span></h6>
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
        </div> <!-- ./row -->

        <div class="heading">
          <p class="add-file">اضافة بطاقة صوتية</p>
        </div>

        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
          <select class="select-file" name="select-file" required>

            <option selected disabled>اختر الفئة</option>

            <?php foreach ($categoriess as $option): ?>
              <option name="<?= $option["english_name"] ?>">
                <?= $option["arabic_name"] ?>
              </option>
            <?php endforeach; ?>

          </select>

          <input class="file-title" type="text" placeholder="اكتب عنوان البطاقة" Required name="title">

          <div class="row d-flex justify-content-center">
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body text-center">
                      <i class="fa-solid fa-music icon"></i>
                      <div class="dash-text text-center">
                        <p>اختر الملف الصوتي</p>
                        <!-- <p class="text-align-center py-2">اختر صوت</p> -->
                        <input type="file" name="speech">

                      </div>
                      <?php if (@$error2 != '') { ?>
                        <h4 class="alert alert-danger col text-center mt-2">
                          <?php echo @$error2; ?>
                        </h4>
                      <?php } ?>

                      <?php
                      if (@$success != '') { ?>
                        <h4 class="alert alert-success col text-center mt-2">
                          <?php echo @$success; ?>
                        </h4>
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <a style="color:white; text-decoration:none;" href="exercise.php">
                      <div class="card-body text-right">
                        <i class="fa-solid fa-image icon"></i>
                        <div class="dash-text text-center">
                          <p>اختر صورة البطاقة الصوتية</p>
                          <input type="file" name="image">
                        </div>
                        <?php if (@$error1 != '') { ?>
                          <h4 class="alert alert-danger col text-center mt-2">
                            <?php echo @$error1; ?>
                          </h4>
                        <?php } ?>

                        <?php
                        if (@$success != '') { ?>
                          <h4 class="alert alert-success col text-center mt-2">
                            <?php echo @$success; ?>
                          </h4>
                        <?php } ?>
                      </div>
                    </a>
                  </div>
                </div>
              </div> <!-- ./row -->
            </div> <!-- ./col-6 -->
          </div> <!-- ./row -->
          <div>
            <img src="./images/rocket.png" alt="" srcset="" class="rocket" height=70px>
            <input type="submit" name="submit" value="ارسال البيانات" class="submit-file">
          </div>
        </form>
      </div>

      <?php require("includes/home-footer.php"); ?>

    </div>

  </div> <!-- ./container-scroller -->

  <?php require("includes/home-scripts.php"); ?>