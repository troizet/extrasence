<?php

namespace app\components;

use app\interfaces\GuessLogicInterface;

class GuessLogicTwo implements GuessLogicInterface {
    
    private $number;
    
    public function __construct() {
        $this->number = 0;
    }
    
    public function guess(): int {
        return ++$this->number;
    }

}
