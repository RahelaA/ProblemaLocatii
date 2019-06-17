<?php

use App\BoardingCard;


class BoardingCardTest extends \PHPUnit\Framework\TestCase
{

    public function test_it_should_set_boardingcard_data()
    {
        $boardingCard = new BoardingCard('Bucuresti', 'Ploiesti', '3', 'train', 'Drumul dureaza 2 ore.');

        $this->assertEquals('Bucuresti', $boardingCard->getDeparture());
        $this->assertEquals('Ploiesti', $boardingCard->getDestination());
        $this->assertEquals('3', $boardingCard->getSeat());
        $this->assertEquals('train', $boardingCard->getTransport());
        $this->assertEquals('Drumul dureaza 2 ore.', $boardingCard->getDetails());
    }

    public function test_it_should_return_string_output()
    {
        $boardingCard = new BoardingCard('Bucuresti', 'Ploiesti', '3', 'train', 'Drumul dureaza 2 ore.');

        $this->assertEquals('Take train from Bucuresti to Ploiesti. Seat in 3', $boardingCard->getStringOutput());
    }
}
