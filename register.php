<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login_register.css">
    <title>Register</title>
</head>

<?php
require("config/database.php");
require("classes/user.php");

$newUser = new user($pdo);

if ($_POST && isset($_POST["submit"])) {

    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password1"];
    $repassword = $_POST["password2"];

    $result = $newUser->register($firstName, $lastName, $email, $password, $repassword);
    if ($result === true) {
        header("location: login.php");
    } else {
        $errors = $result;
    }
}
?>


<body id="register-page">
    <div class="">
        <div class="row d-flex">
            <div class="col-lg-6 col-md-8 col-sm-12 justify-content-center align-items-center">
                <div class="my-md-3 my-sm-5 my-xs-5 d-flex justify-content-center align-items-center box_small">
                    <div class="box form-box">
                        <header>انشاء حساب جديد</header>

                        <form action="" method="POST">
                            <div class="field input d-flex">
                                <div class="pr-2">
                                    <label class="" for="lastName">اسم العائلة</label>
                                    <?php if (isset($errors)): ?>
                                    <input type="text" name="lastName" id="lastName" value="<?= $lastName ?>"
                                        required />
                                    <?php else: ?>
                                    <input type="text" name="lastName" id="lastName" required />
                                    <?php endif; ?>
                                </div>

                                <div class="pl-2">
                                    <label for="firstName">الاسم الأول</label>
                                    <?php if (isset($errors)): ?>
                                    <input type="text" name="firstName" id="firstName" value="<?= $firstName ?>"
                                        required />
                                    <?php else: ?>
                                    <input type="text" name="firstName" id="firstName" required />
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="field input">
                                <label for="email">البريد الإلكتروني</label>
                                <?php if (isset($errors)): ?>
                                <input type="text" name="email" id="email" value="<?= $email ?>" required />
                                <?php else: ?>
                                <input type="text" name="email" id="email" required />
                                <?php endif; ?>

                                <?php if (isset($errors["invalid-email"])): ?>
                                <h6 class="mt-1 text-danger text-left">
                                    <?= $errors["invalid-email"] ?>
                                </h6>
                                <?php endif; ?>

                                <?php if (isset($errors["exist-email"])): ?>
                                <h6 class="mt-1 text-danger text-left">
                                    <?= $errors["exist-email"] ?>
                                </h6>
                                <?php endif; ?>

                            </div>

                            <div class="field input">
                                <label for="password1">كلمة السر</label>
                                <?php if (isset($errors)): ?>
                                <input type="password" name="password1" id="password1" value="<?= $password ?>"
                                    required />
                                <?php else: ?>
                                <input type="password" name="password1" id="password1" required />
                                <?php endif; ?>
                            </div>

                            <div class="field input">
                                <label for="password2">إعادة كلمة السر</label>
                                <?php if (isset($errors)): ?>
                                <input type="password" name="password2" id="password2" value="<?= $repassword ?>"
                                    required />
                                <?php else: ?>
                                <input type="password" name="password2" id="password2" required />
                                <?php endif; ?>

                                <?php if (isset($errors["repassword"])): ?>
                                <h6 class="mt-1 text-danger text-left">
                                    <?= $errors["repassword"] ?>
                                </h6>
                                <?php endif; ?>

                            </div>

                            <div class="field">
                                <input type="submit" class="btn" name="submit" value="انشاء حساب" required />
                            </div>
                            <div class="link">
                                بالفعل تمتلك حساب؟ <a href="./login.php">تسجيل الدخول</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-8 col-sm-12">
                <img src="./images/LecturImatges__la_lectura_en_imatges-removebg-preview.png" alt="" />
            </div>
        </div>
    </div>
</body>

</html>