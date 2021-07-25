<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use app\interfaces\GuessLogicInterface;

/**
 * Description of GuessLogicTwo
 *
 * @author krok
 */
class GuessLogicTwo implements GuessLogicInterface {
    //put your code here
    public function guess(): int {
        return 30;
    }

}
