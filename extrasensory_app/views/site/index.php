<?php

use yii\web\View;

/* @var $this View */


$this->registerJsFile("https://unpkg.com/vue@next");
$this->registerJsFile('js/main.js');
?>


<div id="main">
    <div id="user-input">
        <div id="user-start" v-if="!isGuessed">
            Загадайте двузначное число от 10 до 99:
            <button :disabled="!enabled" type="button" id="number_button" v-on:click="getGuess()">Загадал</button>
        </div>    
        <div id="user-guessed" v-if="isGuessed">
            Введите загаданное число:
            <input type="text" id="number_input" v-model="guessedNumber">
            <button :disabled="!enabled" type="button" id="number_button" v-on:click="getAcuracy()">Отправить</button>        
        </div>
    </div>
    <div id="error-message" v-if="showError">
        {{ this.error }}
    </div>
    <div id="extrasences-table">
        Текущие догадки экстрасенсов:
        <ul id="array-rendering">
            <li v-for="item in extrasences">
               Экстрасенс: {{ item.name }} Догадка: {{ item.guess }} Уровень достоверности: {{ item.acuracy }}
            </li>
        </ul>
    </div>
    <div id="extrasences-table-history">
        История:
        <ul id="array-rendering">
            <li v-for="(item, index) in history">
               Раунд: {{index}} Загаданное число: {{ item.number }} Догадки: 
               <ul>
                    <li v-for="guess in item.guessed">
                        Экстрасенс: {{ guess.name }} Догадка: {{ guess.guess }}
                    </li>
               </ul>
            </li>
        </ul>
     </div>

         
</div>