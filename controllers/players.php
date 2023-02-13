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

        // créer une method attack enlevant des points de vie de player
        public function attack($target) {
            $target->setHealth($target->getHealth() - $this->getAttack());
           
            
        }
   
   
}
 // Créer une fonction showPlayer
function showPlayer($player) {
    echo '
    <div class="col-5 ">
        <div class="h3"> '. $player->getName() .' </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="'. $player->getHealth() / 2000 * 100 .'" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-success" style="width:'. $player->getHealth() / 2000 * 100 .'%">
            '.$player->getHealth().'
            </div>
         </div>
        <img src="'.$player->getImage().'" alt="">
    </div>
    ';
}


