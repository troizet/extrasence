<?php

namespace app\factory;

use app\components\Extrasense;
use Yii;

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
