<?php

namespace app\interfaces;

interface StoreInterface {
    public function getExtrasences(): array;
    public function getHistory(): object;
    public function setExtrasences(array $extrasences): void;
    public function setHistory($history): void;
    public function clear(): void;
}
