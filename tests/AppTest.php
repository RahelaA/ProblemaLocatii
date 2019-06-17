<?php

use App\App;
use App\BoardingCard;
use PHPUnit\Framework\TestCase;



class AppTest extends TestCase
{

    public function test_it_should_add_boarding_cards()
    {
        $app = new App();
        $app->addBoardingCard(new BoardingCard('Bucuresti', 'Ploiesti', '1', 'bus', 'Drumul dureaza 2 ore.'));

        $this->assertCount(1, $app->getBoardingCards());
    }

    public function test_it_should_return_an_array_with_departures_as_keys()
    {
        $app = new App();
        $app->addBoardingCard(new BoardingCard('Bucuresti', 'Ploiesti', '1', 'bus', 'Drumul dureaza 2 ore.'));
        $app->addBoardingCard(new BoardingCard('Ploiesti', 'Brasov', '1', 'train', 'Drumul dureaza 2 ore.'));

        $departures = $app->getDepartures();

        $this->assertArrayHasKey('Bucuresti', $departures);
        $this->assertArrayHasKey('Ploiesti', $departures);
    }

    public function test_it_should_return_an_array_with_destinations_as_keys()
    {
        $app = new App();
        $app->addBoardingCard(new BoardingCard('Bucuresti', 'Ploiesti', '1', 'bus', 'Drumul dureaza 2 ore.'));
        $app->addBoardingCard(new BoardingCard('Ploiesti', 'Brasov', '1', 'train', 'Drumul dureaza 2 ore.'));

        $destinations = $app->getDestinations();

        $this->assertArrayHasKey('Ploiesti', $destinations);
        $this->assertArrayHasKey('Brasov', $destinations);
    }

    public function test_it_should_return_starting_location()
    {
        $app = new App();
        $app->addBoardingCard(new BoardingCard('Bucuresti', 'Ploiesti', '1', 'bus', 'Drumul dureaza 2 ore.'));
        $app->addBoardingCard(new BoardingCard('Ploiesti', 'Brasov', '1', 'train', 'Drumul dureaza 2 ore.'));

        $destinations = $app->getDestinations();

        $this->assertEquals('Bucuresti', $app->getStartingLocation($destinations));
    }


}
