<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\factory;

use app\components\Extrasense;
use Yii;

/**
 * Description of ExtrasenceFactory
 *
 * @author krok
 */
class ExtrasenceFactory {

    public static function getExtrasences(): array {
        
        $ext = [];
        
        $extrasences = Yii::$app->params['extrasences'];
        
        foreach ($extrasences as $extrasence) {
            $ext[] = new Extrasense($extrasence['name'], GuessLogicFactory::getLogic($extrasence['logic']));
        }

        return $ext;
    }

}
