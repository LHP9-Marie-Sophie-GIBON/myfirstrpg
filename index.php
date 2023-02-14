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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="icon" href="assets/img/header.gif">
</head>

<body>
    <header>
        <nav class="navbar fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="assets/img/Site-logo.webp" alt="" style="height: 50px;"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Final_Fantasy_logo_with_japanese_name.svg/1200px-Final_Fantasy_logo_with_japanese_name.svg.png" alt="" style="height: 45px;"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">MENU</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Characters</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Enemies</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <div class="row justify-content-center">

        <!-- Character-choice -->
        <div class="col-2 justify-content-center">
            <form action="" method="post">
                <!-- Card Warrior -->
                <?php
                if (!isset($_SESSION['warrior'])) {
                    $warrior = new Warrior('Warrior', 0, 2000, 700, 400, 'assets/img/warrior.png');
                } else {
                    $warrior = $_SESSION['warrior'];
                }
                ?>
                <div class="row justify-content-center">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalWarrior">
                        <img src="assets/img/warior.webp" class="img-fluid rounded-start" alt="...">
                    </button>
                </div>

                <!-- Modal warrior-->
                <div class="modal fade" id="modalWarrior" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $warrior->getName() ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="<?= $warrior->getImage() ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-success" style="width: <?= $warrior->getHealth() / 2000 * 100 ?>%">
                                            <?= $warrior->getHealth() ?>
                                        </div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getRage() ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-danger" style="width: <?= $warrior->getRage() ?>%">
                                            <?= $warrior->getRage() ?>
                                        </div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getAttack() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-info" style="width: <?= $warrior->getAttack() / 1000 * 100 ?>%">
                                            <?= $warrior->getAttack() ?>
                                        </div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getArmor() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-warning" style="width: <?= $warrior->getArmor() / 1000 * 100 ?>%">
                                            <?= $warrior->getArmor() ?>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="choose" name="warrior">
                                <?php
                                if (isset($_POST['warrior'])) {
                                    $_SESSION['warrior'] = $warrior;
                                }
                                ?>
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
                <div class="row justify-content-center">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalMage">
                        <img src="assets/img/mage.webp" class="img-fluid rounded-start" alt="...">
                    </button>
                </div>

                <!-- Modal Mage -->
                <div class="modal fade" id="modalMage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $mage->getName() ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <img src="<?= $mage->getImage() ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $mage->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-success" style="width: <?= $mage->getHealth() / 2000 * 100 ?>%">
                                            <?= $mage->getHealth() ?>
                                        </div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $mage->getAttack() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-info" style="width: <?= $mage->getAttack() / 1000 * 100 ?>%">
                                            <?= $mage->getAttack() ?>
                                        </div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $mage->getArmor() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-warning" style="width: <?= $mage->getArmor() / 1000 * 100 ?>%">
                                            <?= $mage->getArmor() ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="choose" name="mage">
                                <?php
                                if (isset($_POST['mage'])) {
                                    $_SESSION['mage'] = $mage;
                                }
                                ?>
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
                <div class="row justify-content-center">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalArcher">
                        <img src="assets/img/archer.webp" class="img-fluid rounded-start" alt="...">
                    </button>
                </div>

                <!-- Modal Archer -->
                <div class="modal fade" id="modalArcher" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $archer->getName() ?></h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="text-center">
                                    <img src="<?= $archer->getImage() ?>" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col">
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $archer->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-success" style="width: <?= $archer->getHealth() / 2000 * 100 ?>%">
                                            <?= $archer->getHealth() ?>
                                        </div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $archer->getAttack() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-info" style="width: <?= $archer->getAttack() / 1000 * 100 ?>%">
                                            <?= $archer->getAttack() ?>
                                        </div>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $archer->getArmor() / 1000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-warning" style="width: <?= $archer->getArmor() / 1000 * 100 ?>%">
                                            <?= $archer->getArmor() ?>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="modal-footer">
                                <input type="submit" value="choose" name="archer">
                                <?php
                                if (isset($_POST['archer'])) {
                                    $_SESSION['archer'] = $warrior;
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- bouton reset -->
                <div class="row">
                    <a href="deco.php" class="text-center"><button class="btn"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Quick_restart.png" style="width:50px" /></button></a>
                </div>
            </form>
        </div>

        <!-- input fight -->
        <div class="col-2">
            <form action="" method="post">
                <button class="btn" type="submit" name="fight" value="Fight" id="fight">
                    <img class="fight" src="https://icon-library.com/images/combat-icon/combat-icon-2.jpg" />
                </button>
            </form>
        </div>

        <!-- BATTLE ARENA -->
        <div class="col-7 border  border-5 border-dark arena">
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
                } else

                    // faire combattre monster et player en gardant le player choose
                    if (isset($_POST['fight']) && isset($_SESSION['warrior'])) {

                        $monster = $_SESSION['monster'];
                        $warrior->attacked($monster);

                        if ($warrior->getRage() == 100) {
                            $monster->attacked($warrior);
                            $warrior->setRage(0);
                        }

                        // if warrior ou monster n'ont plus de point de vie, game over
                        if ($warrior->getHealth() <= 0) {
                            echo '<div class="text-center"><h1>GAME OVER</h1></div>
                            <a href="deco.php" class="text-center"><button class="btn reset"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Quick_restart.png" style="width:50px"/></button></a>';
                        } else if ($monster->getHealth() <= 0) {
                            echo '<div class="text-center"><h1>YOU WIN</h1></div>
                            <a href="deco.php" class="text-center"><button class="btn reset"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Quick_restart.png" style="width:50px"/></button></a>';
                        } else {
                            showWarrior($warrior);
                            showMonster($monster);
                        }

                        $round = $round + 1;
                        $_SESSION['round'] = $round;
                    } else if (isset($_POST['fight']) && isset($_SESSION['mage'])) {
                        $monster = $_SESSION['monster'];

                        $monster->attacked($mage);
                        $mage->attacked($monster);

                        // if mage ou monster n'ont plus de point de vie game over
                        if ($mage->getHealth() <= 0) {
                            echo '<div class="text-center"><h1>GAME OVER</h1></div>
                            <a href="deco.php" class="text-center"><button class="btn reset"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Quick_restart.png" style="width:50px"/></button></a>';
                        } else if ($monster->getHealth() <= 0) {
                            echo '<div class="text-center"><h1>YOU WIN</h1></div>
                            <a href="deco.php" class="text-center"><button class="btn reset"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Quick_restart.png" style="width:50px"/></button></a>';
                        } else {
                            showPlayer($mage);
                            showMonster($monster);
                        }

                        $round = $round + 1;
                        $_SESSION['round'] = $round;
                    } else if (isset($_POST['fight']) && isset($_SESSION['archer'])) {
                        $monster = $_SESSION['monster'];

                        if ($round % 2 == 0) {
                            $monster->attacked($archer);
                        }
                        $archer->attacked($monster);

                        // if archer ou monster n'ont plus de point de vie game over
                        if ($archer->getHealth() <= 0) {
                            echo '<div class="text-center"><h1>GAME OVER</h1></div>
                            <a href="deco.php" class="text-center"><button class="btn reset"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Quick_restart.png" style="width:50px"/></button></a>';
                        } else if ($monster->getHealth() <= 0) {
                            echo '<div class="text-center"><h1>YOU WIN</h1></div>
                            <a href="deco.php" class="text-center"><button class="btn reset"><img src="https://upload.wikimedia.org/wikipedia/commons/a/ae/Quick_restart.png" style="width:50px"/></button></a>';
                        } else {
                            showPlayer($archer);
                            showMonster($monster);
                        }

                        $round = $round + 1;
                        $_SESSION['round'] = $round;
                    } else

                        // afficher les joueurs et les monstres au refresh de la page
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
                        } else {
                            echo '
                                <div class="h3 fw-bold row text-center chooseHero">
                                <p>Click on the cards and choose your hero</p>
                                </div>';
                        }
                ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



</body>

</html>