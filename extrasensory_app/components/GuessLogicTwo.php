<?php

namespace app\components;

use app\interfaces\GuessLogicInterface;

class GuessLogicTwo implements GuessLogicInterface {
    
    private $number;
    
    public function __construct() {
        $this->number = 9;
    }
    
    public function guess(): int {
        if ($this->number > 99) {
            $this->number = 9;
        }
        return ++$this->number;
    }

}
