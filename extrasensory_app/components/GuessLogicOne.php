<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use app\interfaces\GuessLogicInterface;

/**
 * Description of GuessLogicOne
 *
 * @author krok
 */
class GuessLogicOne implements GuessLogicInterface {
    //put your code here
    public function guess(): int {
        return rand(0, 99);
    }

}
