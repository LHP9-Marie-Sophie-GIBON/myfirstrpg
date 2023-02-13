<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    require_once 'controllers/character.php';
    require_once 'controllers/players.php';
    require_once 'controllers/monsters.php';
    require_once 'controllers/warrior.php';

    session_start();

    if (isset($_SESSION['round'])) {
        $round = $_SESSION['round'];
    } else {
        $round = 0;
    }

    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myFirstRPG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <form action="" method="post">
        <div class="row m-3">
            <!-- Card Warrior -->
            <?php
            if (!isset($_SESSION['warrior'])) {
                $warrior = new Warrior('Warrior', 0, 2000, 700, 400, 'assets/img/warrior.png');
            } else {
                $warrior = $_SESSION['warrior'];
            }
            ?>
            <div class="col card m-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/warior.webp" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $warrior->getName() ?> </h5>
                            <div class="card-text">
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: <?= $warrior->getHealth() / 2000 * 100 ?>%">
                                        HP : <?= $warrior->getHealth() ?>
                                    </div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getRage() ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-danger" style="width: <?= $warrior->getRage() ?>%">
                                        Rage : <?= $warrior->getRage() ?>
                                    </div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getAttack() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-info" style="width: <?= $warrior->getAttack() / 1000 * 100 ?>%">
                                        Attack : <?= $warrior->getAttack() ?>
                                    </div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getArmor() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-warning" style="width: <?= $warrior->getArmor() / 1000 * 100 ?>%">
                                        Armor : <?= $warrior->getArmor() ?>
                                    </div>
                                </div>

                            </div>
                            <div>
                                <input type="submit" value="choose" name="warrior">
                                <?php if (isset($_POST['warrior'])) {
                                    $_SESSION['warrior'] = $warrior;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Mage -->
            <?php
            if (!isset($_SESSION['mage'])) {
                $mage = new Player('Mage', 1000, 450, 250, 'assets/img/mage.png');
            } else {
                $mage = $_SESSION['mage'];
            }
            ?>
            <div class="col card m-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/mage.webp" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $mage->getName() ?> </h5>
                            <div class="card-text">
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $mage->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: <?= $mage->getHealth() / 2000 * 100 ?>%">
                                        HP : <?= $mage->getHealth() ?>
                                    </div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $mage->getAttack() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-info" style="width: <?= $mage->getAttack() / 1000 * 100 ?>%">
                                        Attack : <?= $mage->getAttack() ?>
                                    </div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $mage->getArmor() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-warning" style="width: <?= $mage->getArmor() / 1000 * 100 ?>%">
                                        Armor : <?= $mage->getArmor() ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <input type="submit" value="choose" name="mage">
                            <?php if (isset($_POST['mage'])) {
                                $_SESSION['mage'] = $mage;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Archer -->
            <?php
            if (!isset($_SESSION['archer'])) {
                $archer = new Player('Archer', 1500, 600, 350, 'assets/img/archer.png');
            } else {
                $archer = $_SESSION['archer'];
            }
            ?>
            <div class="col card m-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="assets/img/archer.webp" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $archer->getName() ?> </h5>
                            <div class="card-text">
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $archer->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-success" style="width: <?= $archer->getHealth() / 2000 * 100 ?>%">
                                        HP : <?= $archer->getHealth() ?>
                                    </div>
                                </div>

                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $archer->getAttack() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-info" style="width: <?= $archer->getAttack() / 1000 * 100 ?>%">
                                        Attack : <?= $archer->getAttack() ?>
                                    </div>
                                </div>
                                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $archer->getArmor() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar bg-warning" style="width: <?= $archer->getArmor() / 1000 * 100 ?>%">
                                        Armor : <?= $archer->getArmor() ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div>
                            <input type="submit" value="choose" name="archer">
                            <?php if (isset($_POST['archer'])) {
                                $_SESSION['archer'] = $archer;
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <form action="" method="post">
        <input type="submit" name="fight" value="Fight">
    </form>
    <a href="deco.php"><input type="button" value="reset"></a>

    <!-- BATTLE ARENA -->
    <div class="container border border-dark rounded">
        <div class="row p-3 justify-content-center">
            <?php

            // Afficher les joueurs et les monstres
            if (isset($_POST['warrior'])) {
                showWarrior($warrior);
                showMonster($monster);

                $_SESSION['monster'] = $monster;
                $_SESSION['warrior'] = $warrior;

            } else if (isset($_POST['mage'])) {
                showPlayer($mage);
                showMonster($monster);

                $_SESSION['monster'] = $monster;
                $_SESSION['mage'] = $mage;
                
            } else if (isset($_POST['archer'])) {
                showPlayer($archer);
                showMonster($monster);

                $_SESSION['monster'] = $monster;
                $_SESSION['archer'] = $archer;
            }

            // faire combattre monster et player en gardant le player choose
            if (isset($_POST['fight']) && isset($_SESSION['warrior'])) {
                
                $monster = $_SESSION['monster']; 
                $warrior->attacked($monster);

                if($warrior->getRage() == 100){
                    $monster->attacked($warrior);
                    $warrior->setRage(0); 
                }
                
                $round = $round +1; 
                $_SESSION['round'] = $round; 
                

            } else if (isset($_POST['fight']) && isset($_SESSION['mage'])) {
                $monster = $_SESSION['monster']; 
                $monster->attacked($mage);
                $mage->attacked($monster);

                $round = $round +1; 
                $_SESSION['round'] = $round; 
               

            } else if (isset($_POST['fight']) && isset($_SESSION['archer'])) {
                $monster = $_SESSION['monster']; 

                if ($round % 2 == 0) {
                    $monster->attacked($archer);
                }
                $archer->attacked($monster);

                $round = $round +1; 
                $_SESSION['round'] = $round; 
                

            }

            // Afficher les joueurs et les monstres au refresh
            if (isset($_SESSION['warrior']) && isset($_SESSION['monster'])) {
                $monster = $_SESSION['monster']; 

                showWarrior($warrior);
                showMonster($monster);

            } else if (isset($_SESSION['mage']) && isset($_SESSION['monster'])) {
                $monster = $_SESSION['monster']; 

                showPlayer($mage);
                showMonster($monster);

            } else if (isset($_SESSION['archer']) && isset($_SESSION['monster'])) {
                $monster = $_SESSION['monster']; 

                showPlayer($archer);
                showMonster($monster);

            }
            ?>
        </div>



    </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>



</body>

</html>