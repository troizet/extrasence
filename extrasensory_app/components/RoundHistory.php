<?php

namespace app\components;

use app\interfaces\HistoryInterface;

class RoundHistory implements HistoryInterface {
    
    private $rounds = [];
    
    public function setRound(int $number, array $extrasences): void
    {
        $extrasenseGuesses = [];
        foreach ($extrasences as $extrasence) {
            $extrasenseGuesses[] = [
                'name' => $extrasence->getName(),
                'guess' => $extrasence->getGuessed()
            ];
        }
        
        $this->rounds[] = [
            'number' => $number,
            'guessed' => $extrasenseGuesses
        ];
    }
    
    public function getRounds(): array
    {
        return $this->rounds;
    }
}
