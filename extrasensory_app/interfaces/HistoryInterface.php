<?php

namespace app\interfaces;

interface HistoryInterface {
    public function setRound(int $number, array $extrasences): void;
    public function getRounds(): array;
}
