<?php

class Player {
    private string $name;
    private int $health;
    private array $cards;
    
    public function __construct(string $name, int $health, array $cards)
    {
        $this->name = $name;
        $this->health = $health;
        $this->cards = $cards;
    }
    
    public function getName() 
    {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getHealth() 
    {
        return $this->health;
    }
    
    public function setHealth($health) {
        $this->health = $health;
    }
    
    public function getCards() 
    {
        return $this->cards;
    }
    
    public function setCards($cards) {
        $this->cards = $cards;
    }
    
    public function getCountCards() {
        return count($this->cards);
    }
    
    public function receiveDamage($damage) 
    {
        $this->health -= $damage;
    }
    
    public function drawCard() {
        if(count($this->cards) > 0) {
            $card = array_shift($this->cards);
            return $card;
        }
    }
}

?>