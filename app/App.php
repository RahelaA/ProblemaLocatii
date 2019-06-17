<?php

namespace App;

class App
{
    /**
     * @var array
     */
    private $boardingCards;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->boardingCards = [];
    }

    /**
     * @param BoardingCard $boardingCard
     */
    public function addBoardingCard(BoardingCard $boardingCard)
    {
        array_push($this->boardingCards, $boardingCard);
    }

    /**
     * @return array
     */
    public function getBoardingCards()
    {
        return $this->boardingCards;
    }

    /**
     * @return array
     */
    public function sortBoardingCards()
    {
        $departures = $this->getDepartures();
        $destinations = $this->getDestinations();
        $startingLocation = $this->getStartingLocation($destinations);

        $currentLocation = $startingLocation;
        $sortedBoardingCards = [];

        while ($currentBoardingCard = (array_key_exists($currentLocation, $departures) ? $departures[$currentLocation] : null)) {
            array_push($sortedBoardingCards, $currentBoardingCard);
            $currentLocation = $currentBoardingCard->getDestination();
        }

        return $sortedBoardingCards;
    }

    /**
     * @return array
     */
    public function getDepartures()
    {
        $departures = [];
        foreach ($this->boardingCards as $boardingCard) {
            $departures[$boardingCard->getDeparture()] = $boardingCard;
        }

        return $departures;
    }

    /**
     * @return array
     */
    public function getDestinations()
    {
        $destinations = [];
        foreach ($this->boardingCards as $boardingCard) {
            $destinations[$boardingCard->getDestination()] = $boardingCard;
        }

        return $destinations;
    }

    /**
     * @param array $destinations
     * @return mixed
     */
    public function getStartingLocation($destinations)
    {
        foreach ($this->boardingCards as $boardingCard) {
            $departure = $boardingCard->getDeparture();

            if (!array_key_exists($departure, $destinations)) {
                return $departure;
            }
        }

        return null;
    }

}