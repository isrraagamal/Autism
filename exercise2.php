<?php
session_start();
require("config/database.php");
require("classes/categories.php");

$category_obj = new categories($pdo);

$category_folder = $category_obj->getCategory($_GET['value']);

if ($category_folder) {
    $result = $category_folder;
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
    <link rel="stylesheet" href="css/exercise.css">
    <link rel="stylesheet" href="css/all.min.css">
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
            <div class="row mb-5">
                <h2 class="mx-3 mb-3 category-title">تدريبات</h2>
            </div>


            <?php
            $counter = $_GET['counter'] ?? 1;
            $value = $_GET['value'];

            $rightAnswer = $counter;
            $randomVar = rand(1, count($result));
            $randomVar2 = rand(1, count($result));

            $arr = [$randomVar, $randomVar2];
            if ($randomVar == $rightAnswer) {
                if ($randomVar > 1) {
                    $randomVar--;
                } else {
                    $randomVar++;
                }
            }
            ;

            if ($randomVar2 == $rightAnswer || $randomVar2 == $randomVar) {
                if ($randomVar2 > 1) {
                    $randomVar2--;
                } else {
                    $randomVar2++;
                }
            }
            ;


            $shuffleArray = [$rightAnswer, $randomVar];
            $shuffleArray2 = [$rightAnswer, $randomVar, $randomVar2];

            shuffle($shuffleArray);
            shuffle($shuffleArray2);
            shuffle($shuffleArray2);
            ?>

            <!-- question with two options -->

            <section class="content-section">

                <?php foreach ($result as $c): ?>
                    <?php if ($c['id'] == $counter): ?>

                        <?php if ($_GET['value'] == "verbs"): ?>
                            <h1 class="text-center">
                                <?= $c['content'] ?>
                            </h1>
                        <?php else: ?>
                            <h1 class="text-center">أين
                                <?= $c['content'] . " ؟ " ?>
                            </h1>
                        <?php endif; ?>

                        <div class="row justify-content-center align-items-center my-3 main-row">
                            <?php if ($c['id'] == $rightAnswer): ?>
                                <div class="col-md-4 grid-margin stretch-card">
                                    <div class="card tale-bg text-center">
                                        <div class="my-3 image-category">
                                            <img src="categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray[0] ?>.png"
                                                width="200px" height="200px" onclick="gett('<?= $shuffleArray[0] ?>')" />
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>

                            <?php foreach ($result as $category): ?>
                                <?php if ($category['id'] == $randomVar && $randomVar != $rightAnswer): ?>
                                    <div class="col-md-4 grid-margin stretch-card">
                                        <div class="card tale-bg text-center">
                                            <div class="my-3 image-category">
                                                <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray[1] ?>.png'
                                                    width="200px" height="200px" onclick="gett('<?= $shuffleArray[1] ?>')" />
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endforeach ?>

                        <?php endif ?>
                    <?php endforeach ?>
                </div>

            </section>

            <?php require("includes/home-footer.php"); ?>
        </div>




        <script>
            // question with three options

            function gett(n) {
                let main_row = document.querySelector(".content-section");
                let check = false;

                if (n == <?php echo $rightAnswer ?>) {
                    
                    window.alert("أحسنت!");
                    main_row.innerHTML = `
                <?php foreach ($result as $c): ?>
                    <?php if ($c['id'] == $counter): ?>

                                <?php if ($_GET['value'] == "verbs"): ?>
                                    <h1 class="text-center">
                                        <?= $c['content'] ?>
                                    </h1>
                            <?php else: ?>
                                <h1 class="text-center">أين
                                    <?= $c['content'] . " ؟ " ?>
                                </h1>
                        <?php endif; ?>
                        
                            <div class="row justify-content-center align-items-center my-3 main-row">
                            <div class="col-md-4 grid-margin stretch-card">
                            <div class="card tale-bg text-center">
                                <?php if ($shuffleArray2[0] == $rightAnswer): ?>
                                        <a href="#?v=<?= $shuffleArray2[0] ?>">
                                            <div class="my-3 image-category">
                                                <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray2[0] ?>.png'
                                                    width="200px" height="200px"/>
                                            </div>
                                        </a>
                                <?php else: ?>
                                    <div class="my-3 image-category">
                                        <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray2[0] ?>.png'
                                        width="200px" height="200px"/>
                                        </div>
                              <?php endif ?>   
                            </div>
                            </div>


                        <?php foreach ($arr as $key => $array): ?>            
                            <?php foreach ($result as $category): ?>
                                <?php if ($category['id'] == $array && $array != $rightAnswer): ?>
                                    <div class="col-md-4 grid-margin stretch-card">
                                        <div class="card tale-bg text-center">
                                        <?php if ($shuffleArray2[$key + 1] == $rightAnswer): ?>
                                            <a href="?counter=<?php echo $counter + 1; ?>&value=<?php echo $value; ?>">
                                                    <div class="my-3 image-category">
                                                        <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray2[$key + 1] ?>.png'
                                                            width="200px" height="200px" />
                                                    </div>
                                                </a>
                                          
                                            <?php else: ?>
                                                <div class="my-3 image-category">
                                                    <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray2[$key + 1] ?>.png'
                                                        width="200px" height="200px"/>
                                                </div>
                                        <?php endif ?>   
                        
                                        </div>
                                    </div>
                                <?php endif ?>
                        <?php endforeach ?>
                    <?php endforeach ?>
                        </div>
                   
                    <?php endif ?>
                <?php endforeach ?>
                `;
             
                } else {
                    alert("حاول مرة اخرى");
                }

                if (<?= $shuffleArray2[0] ?> == <?php echo $rightAnswer; ?>) {
                    var counter = <?php echo $counter; ?> + 1;
                    // Reload the page with the updated counter value
                    location.href = 'exercise2.php?counter=' + counter + '&value=<?php echo $value; ?>';
                }
                else {
                    
                }
            }
        </script>

    </div>
    <?php require("includes/home-scripts.php"); ?>