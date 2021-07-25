<?php

namespace app\components;

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
    private $acuracy;
    

    public function __construct(string $name, GuessLogicInterface $logic) 
    {
        $this->name = $name;
        $this->guessLogic = $logic;
        $this->acuracy = 0;
    }
    
    public function calculateAcuracy(int $number): void
    {
        if ($this->guessed === $number) {
            $this->acuracy++;
        } else {
            $this->acuracy--;
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

    public function getAcuracy(): int
    {
        return $this->acuracy;
    }
    
}
