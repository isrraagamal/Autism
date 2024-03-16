<script>
    let main_row = document.querySelector(".content-section");
    let count = <?= $counter ?>;
    <?php
    $counter = 1;
    $rightAnswer = counter;
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
let i = `
        <section class="content-section" >
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
                                               <div class="card tale-bg text-center">`;
                                                  let im = ` <div class="my-3 image-category">
                                                       <img src="categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray[0] ?>.png"
                                                           width="200px" height="200px" />
                                                   </div> `;
                                                   `
                                               </div>
                                           </div>
                                   <?php endif ?>

                                    <?php foreach ($result as $category): ?>
                                        <?php if ($category['id'] == $randomVar && $randomVar != $rightAnswer): ?>
                                            <div class="col-md-4 grid-margin stretch-card">
                                                <div class="card tale-bg text-center">
                                                    <div class="my-3 image-category">
                                                        <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray[1] ?>.png'
                                                            width="200px" height="200px"/>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php endif ?>
                                <?php endforeach ?>

                            <?php endif ?>
                    <?php endforeach ?>
                </div>

            </section>
          
        </div >


        `;
          im.addeventListener("click",  function gett(n) {
            let main_row = document.querySelector(".content-section");
            let check = false;

            if (n == <?php echo $rightAnswer ?>) {
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
                                                    <a href="#?val=<?= $shuffleArray2[0] ?>">
                                                        <div class="my-3 image-category">
                                                            <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray2[0] ?>.png'
                                                                width="200px" height="200px" '/>
                                                       
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
                                                            <a href="#?val=<?= $shuffleArray2[$key + 1] ?>">
                                                                <div class="my-3 image-category">
                                                                    <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray2[$key + 1] ?>.png'
                                                                        width="200px" height="200px" />
                                                                </div>
                                                            </a>
                                                    
                                                <?php else: ?>
                                                    <div class="my-3 image-category">
                                                        <img src='categories-imgs/<?= $_GET['value'] ?>/<?= $shuffleArray2[$key + 1] ?>.png'
                                                            width="200px" height="200px" onclick= <?= $counter++; ?> '/>
                                                      
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
                // console.log("ok")
            }
               
            });
            
            </script>