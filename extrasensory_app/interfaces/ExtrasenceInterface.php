<?php

namespace app\interfaces;

interface ExtrasenceInterface {
    public function guess(): void;
    public function getGuessed(): ?int;
    public function calculateAcuracy(int $number): void;
    public function getAcuracy(): int;
    public function getName(): string;
}
