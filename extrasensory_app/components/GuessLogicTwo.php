<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use app\interfaces\GuessLogicInterface;

/**
 * Description of GuessLogicTwo
 *
 * @author krok
 */
class GuessLogicTwo implements GuessLogicInterface {
    
    private $number;
    
    public function __construct() {
        $this->number = 0;
    }
    
    public function guess(): int {
        return ++$this->number;
    }

}
