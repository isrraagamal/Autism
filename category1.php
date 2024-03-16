<?php

require("config/database.php");
require("classes/categories.php");

session_start();
if (!isset($_SESSION["user_id"])) {
    header('location: login.php');
}
// $_GET['catName'];
$category_obj = new categories($pdo);

$category_folder = $category_obj->getCategory($_GET['value']);

if ($category_folder) {
    $result = $category_folder;
}



//Deleteee
if ($_POST && isset($_POST["delete"])) {

    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $category_obj->delete_file($_GET['value'], $_GET['id']);
       
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

    <style>
        .gif {
            width: 155%;
            height: 330px;
        }

        .category-title {
            color: brown;
        }

        .cardd {
            background-color: white !important;
            height: 300px;
            width: 250px;
            border-radius: 20px;
        }

        .cart {
            border: 3px solid #4B49AC;
        }

        .cardd img {
            margin: 20px;
        }

        .title-category {
            height: 50px;
        }

        .image-category {
            height: 100px;
        }

        .transparent {
            background-color: rgba(0, 0, 0, 0.5);
            position: fixed;
            top: 0px;
            bottom: 0px;
            right: 0px;
            left: 0px;
            display: none;

            justify-content: center;
            align-items: center;
        }

        .transparent .img-background {
            padding: 40px;
            background-color: white;
            position: relative;
            top: 5%;
            left: 9%;
        }

        .transparent .child-img {
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            height: 400px;
            width: 400px;
            display: none;
            justify-content: space-between;
            align-items: center;
            position: relative;

        }

        .transparent .img-background i {
            font-size: 25px;
            color: black;
            z-index: 999999;
        }

        .transparent #close {
            position: absolute;
            top: 3%;
            right: 3%;
        }

        .transparent i:hover {
            color: gray;
            transition: color 0.5s;
            -webkit-transition: color 0.5s;
            -moz-transition: color 0.5s;
            -ms-transition: color 0.5s;
            -o-transition: color 0.5s;
        }

        .cardd #audioIcon,
        #deleteIcon {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #4B49AC;
        }

        .transparent #audioIcon {
            position: absolute;
            top: 20px;
            left: 20px;
            color: black;
        }

        #deleteIcon {
            position: absolute;
            top: 20px;
            left: -170px;

        }

        #deletebtn {
            color: #4B49AC;
            background-color: none;
            position: absolute;
            top: 10px;
            left: 5px;
            font-weight: bold;
            font-size: 20px;

        }

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
                <h2 class="mx-3 mb-3 category-title">
                    <?php echo @$_GET['catName']; ?>
                </h2>
                <div class="col-md-12 grid-margin">
                    <div class="row">

                        <div class="col-12 col-xl-8 mb-4 mb-xl-0 justify-content-center align-items-center">
                            <img class="gif" src="./images/Jungle.gif" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">

                <?php foreach (@$result as $res): ?>
                    <div class="col-md-4 col-sm-6 grid-margin stretch-card m-xs-auto d-flex justify-content-center">
                        <div class="cardd tale-bg text-center <?= $res['id'] ?>" style="position:relative">
                            <div class="my-3 image-category">
                                <?php $category = $_GET['value'] ?>
                                <h2>
                                    <?= $res['arabic_name'] ?>
                                </h2>
                                <i class="fa-solid fa-volume-high" id="audioIcon"
                                    onclick="<?= $category ?>(<?= $res['id'] ?>)"></i>
                                <?php if ($_SESSION["user_id"] === 1): ?>
                                    <!-- <i class="fa-solid fa-trash" id="deleteIcon"></i> -->
                                    <!-- <button id="deletebtn" class="btn">X</button> -->
                                    <form method="POST"
                                        action="category1.php?id=<?= $res['id'] ?>&catName=<?= $_GET['catName'] ?>&value=<?= $_GET['value'] ?>">
                                        <input name="delete" id="deletebtn" class="btn" value="X" type="submit" />
                                    </form>


                                <?php endif ?>
                                <img src="categories-imgs/<?= $_GET['value'] ?>/<?= $res['id'] ?>.png" height="200px"
                                    width="200px" alt="..." onclick="<?= $category ?>(<?= $res['id'] ?>)">
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="transparent">
                <div class="img-background">
                    <i class="fa-sharp fa-solid fa-circle-xmark" id="close"></i>
                    <div class="child-img">
                        <!-- audio iconnnnnn -->
                    </div>
                </div>
            </div>
        </div>

        <?php require("includes/home-footer.php"); ?>
    </div>

    </div> <!-- ./container-scroller -->

    <script>
        const audio = new Audio();
        let cards = document.querySelectorAll(".cardd");
        let closeBtn = document.querySelector("#close");
        let background = document.querySelector(".transparent");
        let centerImg = document.querySelector(".child-img");

        // # close
        closeBtn.addEventListener("click", () => {
            background.style.display = "none";
        });

        function animals(id) {
            audio.src = `./speech/animals/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/animals/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function body(id) {
            audio.src = `./speech/body/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/body/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function clothes(id) {
            audio.src = `./speech/clothes/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/clothes/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function colors(id) {
            audio.src = `./speech/colors/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/colors/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function food(id) {
            audio.src = `./speech/food/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/food/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function fruits(id) {
            audio.src = `./speech/fruits/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/fruits/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function homeTools(id) {
            audio.src = `./speech/homeTools/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/homeTools/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function insects(id) {
            audio.src = `./speech/insects/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/insects/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function naturalPhenomena(id) {
            audio.src = `./speech/naturalPhenomena/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/naturalphenomena/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function numbers(id) {
            audio.src = `./speech/numbers/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/numbers/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function personalTools(id) {
            audio.src = `./speech/personalTools/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/personalTools/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function reptile(id) {
            audio.src = `./speech/reptile/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/reptile/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function seaanimals(id) {
            audio.src = `./speech/seaanimals/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/seaanimals/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function shapes(id) {
            audio.src = `./speech/shapes/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/shapes/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function transport(id) {
            audio.src = `./speech/transport/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/transport/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function vegetables(id) {
            audio.src = `./speech/vegetables/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/vegetables/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function verbs(id) {
            audio.src = `./speech/verbs/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/verbs/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function jobs(id) {
            audio.src = `./speech/jobs/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/jobs/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }

        function birds(id) {
            audio.src = `./speech/birds/${id}.ogg`;
            audio.play();
            cards.forEach((e) => {
                if (e.classList.contains(id)) {
                    e.classList.add('cart');
                } else {
                    e.classList.remove('cart');
                }
            })
            let imgSrc = `./categories-imgs/birds/${id}.png`;
            background.style.display = "flex";
            centerImg.style.display = "flex";
            centerImg.style.backgroundImage = `url(${imgSrc})`;
        }
    </script>

    <script src="https://kit.fontawesome.com/6700b6d260.js" crossorigin="anonymous">
    < /script

        <?php require("includes/home-scripts.php"); ?>