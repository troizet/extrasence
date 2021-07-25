<?php

namespace app\factory;

use app\components\ExtrasenceStore;
use app\interfaces\StoreInterface;


/**
 * Description of StoreFactory
 *
 * @author krok
 */
class StoreFactory {
    public static function getStore(): StoreInterface
    {
        return new ExtrasenceStore();
    }
}
