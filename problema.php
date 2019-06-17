<?php


use App\App;
use App\BoardingCard;

require "vendor/autoload.php";

header('Content-Type', 'text/plain');

$app = new App();
$app->addBoardingCard(new BoardingCard('Madrid', 'Barcelona', 'seat 45B', 'train 78A', ''));
$app->addBoardingCard(new BoardingCard('Stockholm', 'New York JFK', 'Gate 45B, seat 3A', 'flight SK455 ', 'Baggage will we automatically transferred from your last leg.'));
$app->addBoardingCard(new BoardingCard('Gerona Airport', 'Stockholm', 'Gate 22, seat 7B', 'flight SK22', 'Baggage drop at ticket counter 344.'));
$app->addBoardingCard(new BoardingCard('Barcelona', 'Gerona Airport', '', 'airport bus', ''));

$sortedBoardingCards = $app->sortBoardingCards();

foreach ($sortedBoardingCards as $boardingCard) {
    echo nl2br($boardingCard->getStringOutput(). "\n");
}
 echo "You have arrived at your final destination.";
