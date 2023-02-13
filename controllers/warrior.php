<?php
// Créer une classe Player enfant de Character avec comme attribut name
class Warrior extends Character
{
    private $name;
    private $rage;

    // Créer des GET et SET pour chaque attributs
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
    public function getRage()
    {
        return $this->rage;
    }
    public function setRage($rage)
    {
        $this->rage = $rage;
    }

    // Créer une fonction __construct qui prend en paramètre name, health, attack, armor
    public function __construct($name, $rage, $health, $attack, $armor, $image)
    {
        // Assigner les valeurs des paramètres aux attributs de la class
        parent::__construct($health, $attack, $armor, $image);
        $this->name = $name;
        $this->rage = $rage;
    }

    // créer une method attack enlevant des points de vie à monster
    public function attack($target)
    {
        $target->setHealth($target->getHealth() - $this->getAttack());
      
    }
}

$warrior = new Warrior('Warrior', 0, 2000, 1000, 1000, 'assets/img/warrior.webp');

// Créer une fonction showWarrior
function showWarrior($warrior)
{
    echo '
    <div class="col-5 ">
        <div class="h3"> ' . $warrior->getName() . ' </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' . $warrior->getHealth() / 2000 * 100 . '" aria-valuemin="0" aria-valuemax="100">
        <div class="progress-bar bg-success" style="width:' . ($warrior->getHealth() / 2000 * 200) . '%">
            ' . $warrior->getHealth() . '
            </div>
         </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="' . $warrior->getRage() . '" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar bg-danger" style="width:' . $warrior->getRage() . '%">
            ' . $warrior->getRage() . '
            </div>
        </div>
        <img src="' . $warrior->getImage() . '" alt="">
    </div>
    ';
}
