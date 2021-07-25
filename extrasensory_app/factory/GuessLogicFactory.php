<?php

namespace app\factory;

use app\components\GuessLogicOne;
use app\components\GuessLogicTwo;
use app\interfaces\GuessLogicInterface;

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
