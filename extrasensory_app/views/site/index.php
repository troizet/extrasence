<?php

use yii\helpers\Html;
use yii\web\View;

/* @var $this View */


$this->registerJsFile("https://unpkg.com/vue@next");
$this->registerJsFile('js/main.js');
?>


<div id="main">
    <div id="user-input">
        <div id="user-start" v-if="!isGuessed">
            <button type="button" id="number_button" v-on:click="getGuess()">Start</button>
        </div>    
        <div id="user-guessed" v-if="isGuessed">
            <input type="text" id="number_input" v-model="guessedNumber">
            <button type="button" id="number_button" v-on:click="getAcuracy()">Send</button>        
        </div>
    </div>
    <div id="extrasences-table">
        <ul id="array-rendering">
            <li v-for="item in extrasences">
                {{ item.name }} guessed: {{ item.guess }} acuracy: {{ item.acuracy }}
            </li>
        </ul>
    </div>
</div>