<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_register.css">
    <title>Login</title>
</head>


<?php
require("config/database.php");
require("classes/user.php");
$_SESSION["user_id"] = null;
$_SESSION["user_fname"] = null;
$_SESSION["user_lname"] = null;
$_SESSION["user_email"] = null;

$newUser = new user($pdo);
 if($_POST && isset($_POST["submit"])){

     $email = trim($_POST["email"]);
     $password = $_POST["password"];

    $result = $newUser->login($email, $password);
      if($result === true){
          header("location: home.php");
       }
       if($email === "admin@gmail.com"){
        header("location: dashboard.php");
     }
 }
 ?>

<body id="login-page">
    <div class="">
        <div class="row d-flex">
            <div class="col-lg-6 col-md-8 col-sm-12 img-div">
                <img src="./images/Illustrations_2020_cleanup-removebg-preview.png" alt="" />
            </div>
            <div
                class="col-lg-4 col-md-8 col-sm-12 my-md-3 my-sm-5 my-xs-5 d-flex justify-content-center align-items-center box_small">
                <div class="box form-box">
                    <header>تسجيل الدخول</header>
                    <form action="" method="POST">
                        <div class="field input">
                            <label for="email">البريد الإلكتروني</label>

                            <?php if(isset($result) && $result===false): ?>
                            <input type="text" name="email" id="email" value="<?= $email ?>" required />
                            <?php else: ?>
                            <input type="text" name="email" id="email" required />
                            <?php endif; ?>                                 
                            </div>
                            <div class="field input">
                                <label for="password">كلمة السر</label>
                            <?php if(isset($result) && $result===false): ?>
                            <input type="password" name="password" id="password" value="<?= $password ?>" required />
                            <h6 class="mt-1 text-danger text-left">!! خطأ في البريد الإلكتروني أو كلمة السر</h6>
                            <?php else: ?>
                            <input type="password" name="password" id="password" required />
                            <?php endif; ?>


                        </div>
                        <div class="field">
                            <input type="submit" class="btn" name="submit" value="تسجيل الدخول" required />
                        </div>
                        <div class="link">
                            لا تمتلك حساب؟ <a href="./register.php">انشاء حساب جديد</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>