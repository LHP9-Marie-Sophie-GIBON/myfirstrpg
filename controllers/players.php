<?php
// Créer une classe Player enfant de Character avec comme attribut name
class Player extends Character 
{
    private $name;

     // Créer des GET et SET pour chaque attributs
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    // Créer une fonction __construct qui prend en paramètre name, health, attack, armor
    public function __construct($name, $health, $attack, $armor, $image) {
        // Assigner les valeurs des paramètres aux attributs de la class
        parent::__construct($health, $attack, $armor, $image);
        $this->name = $name;

    }

    public function attacked($monster) {
        // si armor est supérieur à attack, damage = 0
        if ($this->getArmor() > $monster->getAttack()) {
            $damage = 0;
        } else {
            $damage = ($monster->getAttack() - $this->getArmor());
        }

        // soustraire à health le damage
        $this->setHealth($this->getHealth() - $damage);

        // si health est inférieur à 0, health = 0
        if ($this->getHealth() < 0) {
            $this->setHealth(0);
        }
    }


   
   
}

 // Créer une fonction showPlayer
function showPlayer($monster) {
    echo '
    <div class="col-6 player">
        <div class="h3"> '. $monster->getName() .' </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="'. $monster->getHealth() / 2000 * 100 .'" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width:'. $monster->getHealth() / 2000 * 100 .'%">
            '.$monster->getHealth().'
            </div>
         </div>
        <img src="'.$monster->getImage().'" alt="" class="player">
    </div>
    ';
}


