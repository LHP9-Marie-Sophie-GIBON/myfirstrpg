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

    // créer une method attack enlevant des points de vie de player moins la valeur de armor

    public function attack($target) {
        $damage = $this->getAttack() - $target->getArmor();  
        $target->setHealth($target->getHealth() - $damage);

    }

    // créer une method attackRage enlevant des points de vie et augmentant la rage de player
    public function attackRage($target) {
        $target->setHealth($target->getHealth() - $this->getAttack());
        $target->setRage($target->getRage() + 10);
    }

}

// créer un premier monstre
$monster1 = new Monster(1500, 250, 100, 'assets/img/monster1.jpg', 'Titan');
$monster2 = new Monster(100, 10, 5, 'assets/img/monster2.webp', 'Goblin');
$monster3 = new Monster(100, 10, 5,'assets/img/monster3.jpg', 'Spectre');
$monster4 = new Monster(100, 10, 5,'assets/img/monster4.webp','Dragon');
$monster5 = new Monster(100, 10, 5,'assets/img/monster5.jpg', 'Black mage');
$monster6 = new Monster(100, 10, 5,'assets/img/monster6.jpg', 'Chocobo');
$monster7 = new Monster(100, 10, 5, 'assets/img/monster7.jpg', 'Carbuncle');


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
    <div class="col-5 monster">
    <div class="h3"> '. $monster->getType() .' </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' . $monster->getHealth() . '?>" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width: ' . $monster->getHealth() . '%">
            ' . $monster->getHealth() . '
            </div>
        </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' . $monster->getAttack() . '" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-danger" style="width: ' . $monster->getAttack() . '%">
            ' . $monster->getAttack() . '
            </div>
        </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' . $monster->getArmor() . '" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-warning" style="width: ' . $monster->getArmor() . '%">
            ' . $monster->getArmor() . '
            </div>
        </div>
            <img src="'.$monster->getImage().'" alt="" class="monster">
    </div>
    ';
}
