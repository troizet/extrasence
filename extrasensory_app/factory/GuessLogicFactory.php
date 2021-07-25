<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\factory;

use app\components\GuessLogicOne;
use app\components\GuessLogicTwo;
use app\interfaces\GuessLogicInterface;

/**
 * Description of GuessLogicFactory
 *
 * @author krok
 */
class GuessLogicFactory {
    public static function getLogic(string $name): GuessLogicInterface
    {        
        switch($name){
            case 'One':
            {
                $logic = new GuessLogicOne();
                break;
            }
            case "Two":
            {
                $logic = new GuessLogicTwo();
                break;
            }
            default:
            {
                $logic = new GuessLogicOne();
            }
        }
        
        return $logic;
    }
}
