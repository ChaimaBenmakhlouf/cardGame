<?php

class Deck {
    private array $cards = [];
    private int $cardsCount;
    
    public function __construct() { 
        $cards = [];
        $jsonCards = getJsonCards();
        foreach ($jsonCards as $jsonCard) {
            $card = new Card($jsonCard['name'], $jsonCard['life'], $jsonCard['damage']);
            array_push($cards, $card);
        }
        $this->cards = $cards;
        $this->cardsCount = count($this->cards);
    }
    
    
    public function distributeCards() {
        $halfCardsCount = $this->cardsCount/2;
        return array_splice($this->cards, 0, $halfCardsCount);
    }
    
    public function getCards() {
        return $this->cards;
    }
    
    public function setCards($cards) {
        $this->cards = $cards;
    }
    
    
    public function addCards($cards) {
        if (count($this->cards) < 30) 
        {
            array_push($this->cards, $cards);
        }   
    } 
    
    public function shuffle() {
        $numberOfshuffle = rand(3,5);
        $i = 0; 
        while ($i <= $numberOfshuffle) {
            $takenCardNumber = rand(5,20);
            $takenCards = array_splice($this->cards, 0, $takenCardNumber);
            if ($takenCardNumber % 2 == 0) {
                
                $this->cards = array_merge($this->cards, $takenCards);
            } else {
                $this->cards = array_merge($takenCards, $this->cards);
            }
            $i++;
        }
    }
}

?>