<?php

namespace app\factory;

use app\components\ExtrasenceStore;
use app\interfaces\StoreInterface;

class StoreFactory {
    public static function getStore(): StoreInterface
    {
        return new ExtrasenceStore();
    }
}
