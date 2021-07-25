<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\interfaces;

/**
 * Description of StoreInterface
 *
 * @author krok
 */
interface StoreInterface {
    public function getExtrasences(): array;
    public function getHistory(): object;
    public function setExtrasences(array $extrasences): void;
    public function setHistory($history): void;
    public function clear(): void;
}
