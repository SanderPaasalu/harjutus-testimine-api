<?php

declare(strict_types=1);

namespace Tests\integration;

use App\Service\CardDeckService;

class CardDeckServiceTest extends TestCase
{

    public function testGetDeck()
    {
        $cardDeck = CardDeckService::getDeck();

        $this->assertCount(52, $cardDeck);
        $this->assertEquals('4S', $cardDeck[2]);
        $this->assertEquals('2H', $cardDeck[13]);
    }

    public function testGetShuffledDeck()
    {
        $cardDeck = CardDeckService::getShuffledDeck(CardDeckService::getDeck());

        $this->assertCount(52, $cardDeck);
        $this->assertFalse('4S' === $cardDeck[2]);
        $this->assertFalse('2H' === $cardDeck[13]);
    }

    public function testGetRandomTest(){
        $cardDeck = CardDeckService::getShuffledDeck(CardDeckService::getDeck());
        $this->assertCount(52, $cardDeck);
        $this->assertFalse('4C' === $cardDeck[7]);
        $this->assertFalse('10H' === $cardDeck[5]);
    }
    public function testGetNewOne(){
        $cardDeck = CardDeckService::getDeck();
        $this->assertFalse('9H' === $cardDeck[5]);
        $this->assertFalse('6S' === $cardDeck[3]);
    }
}