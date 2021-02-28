<?php


function getJsonCards() {
    $jsonText = file_get_contents('cards.json');
    $json = json_decode($jsonText, true);
    return $json;
}


?>