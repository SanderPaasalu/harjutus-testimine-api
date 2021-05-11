<?php

declare(strict_types=1);

namespace App\Service;

/**
 * @source https://gist.github.com/dsposito/6679592
 */
final class CardDeckService
{

    public static function getDeck()
	{
		$values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
		$suits  = ['S', 'H', 'D', 'C'];
		$cards = [];

		foreach ($suits as $suit) {
			foreach ($values as $value) {
				$cards[] = $value . $suit;
			}
		}
		
		return $cards;
	}

    public static function getShuffledDeck(array $cards)
    {
        $total_cards = count($cards);
		
		foreach ($cards as $index => $card) {
			// Pick a random second card.
			$card2_index = mt_rand(1, $total_cards) - 1;
			$card2 = $cards[$card2_index];
			
			// Swap the positions of the two cards.
			$cards[$index] = $card2;
			$cards[$card2_index] = $card;
		}
		
		return $cards;
    }
}