<?php
// créer une class Character ayant pour attributs health, attack, armor
class Character {
   
    public $health;
    public $attack;
    public $armor;
    public $image; 

    // créer une fonction __construct qui prend en paramètre name, health, attack, armor
    public function __construct($health, $attack, $armor, $image) {
        // assigner les valeurs des paramètres aux attributs de la class
        
        $this->health = $health;
        $this->attack = $attack;
        $this->armor = $armor;
        $this->image = $image;
    }

    // créer des GET et SET pour chaque attributs
    public function getHealth() {
        return $this->health;
    }
    public function setHealth($health) {
        $this->health = $health;
    }
    public function getAttack() {
        return $this->attack;
    }
    public function setAttack($attack) {
        $this->attack = $attack;
    }
    public function getArmor() {
        return $this->armor;
    }
    public function setArmor($armor) {
        $this->armor = $armor;
    }
    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }

} 









