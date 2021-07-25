<?php

namespace app\models;

use app\interfaces\ExtrasenceInterface;
use app\interfaces\GuessLogicInterface;

/**
 * Description of Extrasense
 *
 * @author krok
 */
class Extrasense implements ExtrasenceInterface {

    private $name;
    private $guessLogic;
    private $guessed;
    private $accuracy;
    

    public function __construct(string $name, GuessLogicInterface $logic) 
    {
        $this->name = $name;
        $this->guessLogic = $logic;
        $this->accuracy = 0;
    }
    
    public function calculateAccuracy(int $number): void
    {
        if ($this->guessed === $number) {
            $this->accuracy++;
        } else {
            $this->accuracy--;
        }
    }

    public function getName(): string 
    {
        return $this->name;
    }

    public function guess(): void 
    {
        $this->guessed = $this->guessLogic->guess();
    }
    
    public function getGuessed(): ?int
    {
       return $this->guessed;
    }

    public function getAccuracy(): int
    {
        return $this->accuracy;
    }
    
}
