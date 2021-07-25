<?php

namespace app\factory;

use app\components\RoundHistory;
use app\interfaces\HistoryInterface;

class HistoryFactory {
    public static function getHistory(): HistoryInterface
    {
        return new RoundHistory();
    }
}
