<?php 

require("config/database.php");
require("classes/categories.php");

session_start();
// if(!isset( $_SESSION["user_id"])){
//   header('location: loginn.php');
// }

$category_obj = new categories($pdo);

$category_folder = $category_obj->getAnimals();

if($category_folder){
    $result = $category_folder;

    echo "<br> <br> <br> <br> <br>";
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
    <style>
          .main-panel {
        position: absolute !important;
        top: 61px;
        right: 0px;
    }
    </style>
</head>

<body>


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

            <!-------------------------------ROW-------------------------->

            <!-- $a random -->
            <!-- create an array of 2 items -->
            <?php 
            
            $_SESSION["count"]=6;
            $m=1;
            // setcookie("hh","$m",time()+(50*50*50*50));
             $n=(int)$_COOKIE['hh'];  
             $n++;
             echo $n;    
             if(isset($_GET['src'])){
                echo ($_GET['src']);
            }      
            if(isset($_SESSION["count"])){
                $new = (int)$_SESSION["count"];
                $new++;
                $counter = $new;
                // echo $_SESSION["count"];
                // print_r(next($result));

            }else{
                $counter = 1;
            }
            

            $rightAnswer = $counter;
            $randomVar = rand(1, count($result));
            $randomVar2 = rand(1, count($result));

            if($randomVar == $rightAnswer){
                if($randomVar >1){
                    $randomVar--;
                }else{
                    $randomVar++;
                }
            };

            if($randomVar2 == $rightAnswer || $randomVar2 == $randomVar){
                if($randomVar2 >1){
                    $randomVar2--;
                }else{
                    $randomVar2++;
                }
            };
            
            $shuffleArray = [$rightAnswer, $randomVar];
            $shuffleArray2 = [$rightAnswer, $randomVar, $randomVar2];

            shuffle($shuffleArray);
            shuffle($shuffleArray2);
            
            ?>
            <section class="content-section">

                <?php foreach ($result as $c): ?>
                <?php if ($c['id'] == $n): ?>
                <h1 class="text-center"> اين
                    <?php echo $c['arabic_name'] ?>
                    ?
                </h1>

                <div class="row justify-content-center align-items-center my-3 main-row">
                    <?php if ($c['id'] == $rightAnswer ): ?>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="cardd tale-bg text-center">

                        <?php if($shuffleArray[0] ==$rightAnswer):?>
                            <a href="#?v=<?=$shuffleArray[0] ?>">
                                <div class="my-3 image-category">
                                    <img src='categories-imgs/<?=$_GET['value']?>/<?=$shuffleArray[0] ?>.png'
                                        width="200px" />
                                </div>
                            </a>
                            <?php else:?>
                                <div class="my-3 image-category">
                                    <img src='categories-imgs/<?=$_GET['value']?>/<?=$shuffleArray[0] ?>.png'
                                        width="200px" />
                                </div>
                            <?php endif?>    
                        </div>
                    </div>
                    <?php endif ?>

        
                    <?php endif ?>
                    <?php endforeach ?>
                    <form action="" method="POST">
                    <input name="btn" type="submit" onclick="increment()">
                    </form>

                </div>
            </section>
<script>
    function increment(){
        <?php
            $n++
        ?>
    }
  
    </script>
   

            <?php require("includes/home-footer.php"); ?>
        </div>
    </div>
    <?php require("includes/home-scripts.php"); ?>
    
    <div class="row justify-content-center align-items-center my-3 main-row">
                    <?php if ($c['id'] == $rightAnswer ): ?>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card tale-bg text-center">
                            <div class="my-3 image-category">
                                <img src="categories-imgs/<?=$_GET['value']?>/<?= $shuffleArray[0]  ?>.png"
                                    width="200px" height="200px" />
                            </div>
                        </div>
                    </div>
                    <?php endif ?>

                    <?php foreach ($result as $category):
                // random variable shuffle 
                  if ($category['id'] == $randomVar && $randomVar != $rightAnswer): ?>
                    <div class="col-md-4 grid-margin stretch-card">
                        <div class="card tale-bg text-center">
                            <div class="my-3 image-category">
                                <img src='categories-imgs/<?=$_GET['value']?>/<?=$shuffleArray[1] ?>.png' width="200px"
                                    height="200px"/>
                            </div>
                        </div>
                    </div>

                    <?php endif ?>
                    <?php endforeach ?>

                  
                    