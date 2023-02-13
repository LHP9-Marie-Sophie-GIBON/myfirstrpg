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
    <div class="row mt-5">

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
                                <div class="row">
                                    <div class="col-6">
                                        <img src="<?= $warrior->getImage() ?>" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-6">
                                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $warrior->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-success" style="width: <?= $warrior->getHealth() / 2000 * 100 ?>%">
                                                <?= $warrior->getHealth() ?>
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
                                <div class="row">
                                    <div class="col-6">
                                        <img src="<?= $mage->getImage() ?>" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-6">
                                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $mage->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-success" style="width: <?= $mage->getHealth() / 2000 * 100 ?>%">
                                                <?= $mage->getHealth() ?>
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
                                <div class="row">
                                    <div class="col-6">
                                        <img src="<?= $archer->getImage() ?>" class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-6">
                                        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="<?= $archer->getHealth() / 2000 * 100 ?>" aria-valuemin="0" aria-valuemax="100">
                                            <div class="progress-bar bg-success" style="width: <?= $archer->getHealth() / 2000 * 100 ?>%">
                                                <?= $archer->getHealth() ?>
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
        <div class="col-7 border  border-5 border-dark rounded arena">
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

                // afficher les joueurs et les monstres au refresh de la page
                if (isset($_SESSION['warrior']) && isset ($_SESSION['monster'])) {
                    $monster = $_SESSION['monster'];
                    showWarrior($warrior);
                    showMonster($monster);
                } else if (isset($_SESSION['mage']) && isset ($_SESSION['monster'])) {
                    $monster = $_SESSION['monster'];
                    showPlayer($mage);
                    showMonster($monster);
                } else if (isset($_SESSION['archer']) && isset ($_SESSION['monster'])) {
                    $monster = $_SESSION['monster'];
                    showPlayer($archer);
                    showMonster($monster);
                } else

                // faire combattre monster et player en gardant le player choose
                if (isset($_POST['fight']) && isset($_SESSION['warrior'])) {

                    $monster = $_SESSION['monster'];
                    showWarrior($warrior);
                    showMonster($monster);

                    $warrior->attacked($monster);

                    if ($warrior->getRage() == 100) {
                        $monster->attacked($warrior);
                        $warrior->setRage(0);
                    }

                    $round = $round + 1;
                    $_SESSION['round'] = $round;
                } else if (isset($_POST['fight']) && isset($_SESSION['mage'])) {
                    $monster = $_SESSION['monster'];
                    showPlayer($mage);
                    showMonster($monster);

                    $monster->attacked($mage);
                    $mage->attacked($monster);

                    $round = $round + 1;
                    $_SESSION['round'] = $round;
                } else if (isset($_POST['fight']) && isset($_SESSION['archer'])) {
                    $monster = $_SESSION['monster'];
                    showPlayer($archer);
                    showMonster($monster);

                    if ($round % 2 == 0) {
                        $monster->attacked($archer);
                    }
                    $archer->attacked($monster);

                    $round = $round + 1;
                    $_SESSION['round'] = $round;
                } else {
                    echo '
                    <div class="h3 fw-bold row text-center chooseHero">
                    Click on the cards and choose your hero
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <a href="deco.php" class="text-center"><input type="button" value="reset"></a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>



</body>

</html>