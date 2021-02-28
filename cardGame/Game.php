<?php

require('jsonDecoder.php');
require('Card.php');
require('Deck.php');
require('Player.php');

class Game {
    
    private Player $player1;
    private Player $player2;
    private Deck $deck;
    
    public function __construct() {
        
        $this->deck = new Deck();
        $this->deck->shuffle();
        $player1Cards = $this->deck->distributeCards();
        $player2Cards = $this->deck->distributeCards();
        $this->player1 = new Player('Yugi', 30, $player1Cards);
        $this->player2 = new Player('Kaiba', 30, $player2Cards);
    }
    
    public function startGame() {
        $round = 1;
        echo 'The game start between ' . $this->player1->getName() . ' and ' . $this->player2->getName() . ":<br><br>";
        while ($this->player1->getHealth() > 0 && $this->player2->getHealth() > 0 &&
        $this->player1->getCountCards() > 0 && $this->player2->getCountCards() > 0) {
            echo 'Round ' . $round . " - ";
            echo $this->player1->getName() . " " . $this->player1->getHealth() . " health ";
            echo $this->player2->getName() . " " . $this->player2->getHealth() . " health:<br>";
            $player1Card = $this->player1->drawCard();
            echo "&nbsp &nbsp &nbsp &nbsp" . $this->player1->getName() . ' summon ' . $player1Card->getName() . " damage: " . $player1Card->getDamage() . " life :" . $player1Card->getLife() . "<br>";
            $player2Card = $this->player2->drawCard();
            echo "&nbsp &nbsp &nbsp &nbsp" . $this->player2->getName() . ' summon ' . $player2Card->getName() . " damage: " . $player2Card->getDamage() . " life :" . $player2Card->getLife() . "<br>";
            echo "&nbsp &nbsp &nbsp &nbsp" . $this->player2->getName() . ' damage taken : ';
            $player1Card->attack($player2Card, $this->player2);
            echo "<br>";
            echo "&nbsp &nbsp &nbsp &nbsp" . $this->player1->getName() . ' damage taken : ';
            $player2Card->attack($player1Card, $this->player1);
            echo "<br><br>";
            
            $round = $round + 1;
        }
        
        if ($this->player1->getHealth() <= 0) {
            echo $this->player2->getName() . " won";
        }elseif ($this->player2->getHealth() <= 0) {
            echo $this->player1->getName() . " won";
        }else {
            echo $this->player1->getName() . " and " . $this->player2->getName() . " made a draw";
        }
        
    } 
} 

$game = new Game();
$game->startGame();






?>