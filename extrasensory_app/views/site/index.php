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
            Загадайте двузначное число
            <button type="button" id="number_button" v-on:click="getGuess()">Загадал</button>
        </div>    
        <div id="user-guessed" v-if="isGuessed">
            Введите загаданное число
            <input type="text" id="number_input" v-model="guessedNumber">
            <button type="button" id="number_button" v-on:click="getAcuracy()">Отправить</button>        
        </div>
    </div>
    <div id="extrasences-table">
        Догадки экстрасенсов:
        <ul id="array-rendering">
            <li v-for="item in extrasences">
               Экстрасенс: {{ item.name }} Догадка: {{ item.guess }} Уровень достоверности: {{ item.acuracy }}
            </li>
        </ul>
    </div>
    <div id="error-message" v-if="showError">
        {{ this.error }}
    </div>
         
</div>