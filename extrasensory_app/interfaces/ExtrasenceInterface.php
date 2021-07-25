<?php

namespace app\interfaces;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author krok
 */
interface ExtrasenceInterface {
    public function guess(): void;
    public function getGuessed(): ?int;
    public function calculateAccuracy(int $number): void;
    public function getAccuracy(): int;
    public function getName(): string;
}