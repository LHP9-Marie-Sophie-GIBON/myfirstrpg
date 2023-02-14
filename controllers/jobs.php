<?php
// Créer une class job avec les attributs : Name, Description,Hp, Mp, Attack, Magic, MoveRate, PhysicalEvasionRate
class Job {
    public $name;
    public $description;
    public $hp;
    public $mp;
    public $attack;
    public $nameAttack; 
    public $magic;
    public $moveRate;
    public $physicalEvasionRate;
    public $male;
    public $female;
    public $card;

    // créer des set et get des attributs
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    public function getHp() {
        return $this->hp;
    }
    public function setHp($hp) {
        $this->hp = $hp;
    }
    public function getMp() {
        return $this->mp;
    }
    public function setMp($mp) {
        $this->mp = $mp;
    }
    public function getAttack() {
        return $this->attack;
    }
    public function setAttack($attack) {
        $this->attack = $attack;
    }
    public function getNameAttack() {
        return $this->nameAttack;
    }
    public function setNameAttack($nameAttack) {
        $this->nameAttack = $nameAttack;
    }
    public function getMagic() {
        return $this->magic;
    }
    public function setMagic($magic) {
        $this->magic = $magic;
    }
    public function getMoveRate() {
        return $this->moveRate;
    }
    public function setMoveRate($moveRate) {
        $this->moveRate = $moveRate;
    }
    public function getPhysicalEvasionRate() {
        return $this->physicalEvasionRate;
    }
    public function setPhysicalEvasionRate($physicalEvasionRate) {
        $this->physicalEvasionRate = $physicalEvasionRate;
    }
    public function getMale() {
        return $this->male; 
    }
    public function setMale() {
        $this->male = $male; 
    }
    public function getFemale () {
        return $this->female; 
    }
    public function setFemale () {
        $this->female = $female; 
    }
    public function getCard () {
        return $this->card; 
    }
    public function setCard () {
        $this->card = $card; 
    }


    // créer une fonction __construct qui prend en paramètre name, description, image, hp, mp, attack, magic, moveRate, physicalEvasionRate
    public function __construct($name, $description, $image, $hp, $mp, $attack, $nameAttack, $magic, $moveRate, $physicalEvasionRate) {
        // assigner les valeurs des paramètres aux attributs de la class
        $this->name = $name;
        $this->description = $description;
        $this->hp = $hp;
        $this->mp = $mp;
        $this->attack = $attack;
        $this->nameAttack = $nameAttack;
        $this->magic = $magic;
        $this->moveRate = $moveRate;
        $this->physicalEvasionRate = $physicalEvasionRate;
        $this->male = $male; 
        $this->female = $female;
        $this->card = $card;
    }
}

// Créer les jobs
$archer = new Job
(
"Archer", 
"Equipped with a bow and arrow, this warrior provides valuable long-range attacks",
"1500",
"1000",
"300",
"Aim",
"200",
3,
10,
"assets/img/characters/archer/MaleArcher.png",
"assets/img/characters/archer/FemaleArcher.png",
"assets/img/characters/archer/archer.png"
); 

$dragoon = new Job
(
"Dragoon",
"A warrior who may make soaring Jump attacks even in full armor, the dragoon is also a master spearman",
"2000",
"1000",
"400",
"Jump",
"100",
3,
15,
"assets/img/characters/dragoon/MaleDragoon.png",
"assets/img/characters/dragoon/FemaleDragoon.png",
"assets/img/characters/dragoon/dragoon.png"
);

$geomancer = new Job
(
"Geomancer",
"A warrior who uses Geomancy to control powers lying dormant in the natural terrain",
"2000",
"2000",
"400",
"Geomancy",
"400",
4,
10,
"assets/img/characters/geomancer/MaleGeomancer.png",
"assets/img/characters/geomancer/FemaleGeomancer.png",
"assets/img/characters/geomancer/geomancer.png"
);

$knight = new Job
(
"Knight",
"A brave and chivalrous warrior of unmatched skill. Uses a knight's to unleash the Arts of War",
"2000",
"1500",
"400",
"Arts of War",
"300",
3,
10,
"assets/img/characters/knight/MaleKnight.png",
"assets/img/characters/knight/FemaleKnight.png",
"assets/img/characters/knight/knight.png"
)





   
