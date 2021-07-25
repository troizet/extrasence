<?php

namespace app\components;

use app\interfaces\GuessLogicInterface;

class GuessLogicOne implements GuessLogicInterface {

    public function guess(): int {
        return rand(0, 99);
    }

}
