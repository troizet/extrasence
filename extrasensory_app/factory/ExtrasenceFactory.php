<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\factory;

use app\components\Extrasense;
use app\components\GuessLogicOne;
use app\components\GuessLogicTwo;

/**
 * Description of ExtrasenceFactory
 *
 * @author krok
 */
class ExtrasenceFactory {

    public static function getExtrasences(): array {
        $ext = [];

        $ext[] = new Extrasense('John', new GuessLogicOne());
        $ext[] = new Extrasense('Mary', new GuessLogicTwo());

        return $ext;
    }

}
