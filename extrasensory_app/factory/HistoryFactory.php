<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\factory;

use app\components\RoundHistory;
use app\interfaces\HistoryInterface;

/**
 * Description of HistoryFactory
 *
 * @author krok
 */
class HistoryFactory {
    public static function getHistory(): HistoryInterface
    {
        return new RoundHistory();
    }
}
