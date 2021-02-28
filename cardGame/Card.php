<?php

class Card {
    private string $name;
    private int $life;
    private int $damage;
    
    
    public function __construct(string $name, int $life, int $damage)
    {
        $this->name = $name;
        $this->life = $life;
        $this->damage = $damage;
        
    }
    
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getLife() {
        return $this->life;
    }
    
    public function setLife($life) {
        $this->life = $life;
    }
    
    public function getDamage() {
        return $this->damage;
    }
    
    public function setDamage($damage) {
        $this->damage = $damage;
    }
    
    public function receiveDamage($damage) 
    {
        $remainingDamage = $damage - $this->life;
        
        return $remainingDamage;
    }    
    
    public function attack(Card $opponentCard, Player $opponent) 
    {
        
        $remainingDamage = $this->damage - $opponentCard->getLife();
        if ($remainingDamage > 0) {
            $opponent->receiveDamage($remainingDamage);
            echo $remainingDamage;
        } else {
            echo "0";
        }
    }
}

?>