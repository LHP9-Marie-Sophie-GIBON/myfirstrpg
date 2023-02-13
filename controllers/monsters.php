<?php 
// créer une class Monster enfant de Character avec comme attribut resistace et type
class Monster extends Character {

    public $type;   

    // créer une fonction __construct qui prend en paramètre name, health, attack, armor, resistance, type
    public function __construct($health, $attack, $armor, $image,  $type) {
        // assigner les valeurs des paramètres aux attributs de la class
        parent::__construct($health, $attack, $armor, $image);
      
        $this->type = $type;
        
    }

    // créer des GET et SET pour chaque attributs

    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }

    // créer une method attacked 
    public function attacked($player) {
        // si armor est supérieur à attack, damage = 0
        if ($this->getArmor() > $player->getAttack()) {
            $damage = 0;
        } else {
            $damage = ($player->getAttack() - $this->getArmor());
        }

        // soustraire à health le damage
        $this->setHealth($this->getHealth() - $damage);

        // si health est inférieur à 0, health = 0
        if ($this->getHealth() < 0) {
            $this->setHealth(0);
        }
    }
}

// créer un premier monstre
$monster1 = new Monster(1500, 470,  100, 'assets/img/monster1.png', 'Titan');
$monster2 = new Monster(1000, 460, 30, 'assets/img/monster2.png', 'Goblin');
$monster3 = new Monster(1250, 450, 50,'assets/img/monster3.png', 'Spectre');
$monster4 = new Monster(2000, 410, 100,'assets/img/monster4.png','Dragon');
$monster5 = new Monster(1750, 420, 100,'assets/img/monster5.png', 'Black mage');
$monster6 = new Monster(1000, 410, 10,'assets/img/monster6.png', 'Chocobo');
$monster7 = new Monster(1250, 430, 50, 'assets/img/monster7.png', 'Carbuncle');


// afficher de façon aléatoire un monstre entre 1 (monster1) et 7 (monster7)
$randomMonster = rand(1, 7);
if ($randomMonster == 1) {
    $monster = $monster1;
} elseif ($randomMonster == 2) {
    $monster = $monster2;
} elseif ($randomMonster == 3) {
    $monster = $monster3;
} elseif ($randomMonster == 4) {
    $monster = $monster4;
} elseif ($randomMonster == 5) {
    $monster = $monster5;
} elseif ($randomMonster == 6) {
    $monster = $monster6;
} elseif ($randomMonster == 7) {
    $monster = $monster7;
}

// fonction faisant apparaitre le monster
function showMonster($monster) {
    
    echo '
    <div class="col-5">
    <div class="h3"> '. $monster->getType() .' </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' . $monster->getHealth() /2000 *100 . '?>" aria-valuemin="0" aria-valuemax="1000">
            <div class="progress-bar bg-success" style="width: ' . $monster->getHealth() /2000 *100 . '%">
            ' . $monster->getHealth() . '
            </div>
        </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' . $monster->getAttack() /550 *100 . '" aria-valuemin="0" aria-valuemax="1000">
            <div class="progress-bar bg-danger" style="width: ' . $monster->getAttack() /550 *100 . '%">
            ' . $monster->getAttack() . '
            </div>
        </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' . $monster->getArmor() . '" aria-valuemin="0" aria-valuemax="1000">
            <div class="progress-bar bg-warning" style="width: ' . $monster->getArmor() / 100 *100 . '%">
            ' . $monster->getArmor() . '
            </div>
        </div>
            <img src="'.$monster->getImage().'" alt="" class="monster animate__animated animate__tada">
    </div>
    ';
}
