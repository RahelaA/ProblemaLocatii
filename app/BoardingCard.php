<?php

namespace App;


class BoardingCard
{
    /**
     * @var string
     */
    private $departure;
    /**
     * @var string
     */
    private $destination;
    /**
     * @var string
     */
    private $seat;
    /**
     * @var string
     */
    private $transport;

    /**
     * BoardingCard constructor.
     * @param string $departure
     * @param string $destination
     * @param string $seat
     * @param string $transport
     * @param string $details
     */
    public function __construct($departure, $destination, $seat, $transport, $details)
    {
        $this->departure = $departure;
        $this->destination = $destination;
        $this->seat = $seat;
        $this->transport = $transport;
        $this->details = $details;
    }

    /**
     * @return string
     */
    public function getDeparture()
    {
        return $this->departure;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @return string
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @return string
     */
    public function getTransport() {
        return $this->transport;
    }

    /**
     * @return string
     */
    public function getDetails() {
        return $this->details;
    }

    /**
     * @return string
     */
    public function getStringOutput() {
        $transport = explode(' ', $this->getTransport());
        if( $transport[0] == 'flight' ) {
            return "From " . $this->getDeparture() . ', take ' . $this->getTransport() . ' to ' . $this->getDestination().
                '. ' . $this->getSeat() . '. ' . $this->getDetails();
        } else {
            return 'Take ' . $this->getTransport() . " from " . $this->getDeparture() .  ' to ' . $this->getDestination().
                '. '. ($this->getSeat() ? 'Seat in ' . $this->getSeat() : 'No seat assignment.' );
        }
    }
}