<?php

namespace app\components;

use app\interfaces\ExtrasenceInterface;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RoundHistory
 *
 * @author krok
 */
class RoundHistory {
    
    private $rounds = [];
    
    public function setRound(int $number, array $extrasences)
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
    
    public function getRounds()
    {
        return $this->rounds;
    }
}
