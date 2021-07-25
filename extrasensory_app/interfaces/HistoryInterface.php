<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\interfaces;

/**
 *
 * @author krok
 */
interface HistoryInterface {
    public function setRound(int $number, array $extrasences): void;
    public function getRounds(): array;
}
