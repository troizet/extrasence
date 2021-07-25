<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\components\RoundHistory;
use app\components\Extrasense;
use app\components\GuessLogicOne;
use app\components\GuessLogicTwo;
use Yii;
use yii\rest\Controller;

/**
 * Description of ApiController
 *
 * @author krok
 */
class ApiController extends Controller{
    
    /**
     *
     * @var ExtrasenceInterfaces[]
     */
    private $extrasences = [];
    private $roundHistory;
    
    private $session;
    
    public function init()
    {
        $this->session = Yii::$app->session;
        
        $extrasences = $this->session->get('extrasences');
        $roundHistory = $this->session->get('round_history');
        
        if (!empty($extrasences)) {
            $this->extrasences = $this->unserializeExtrasences($extrasences);
        } else {
            $this->extrasences[] = new Extrasense('John', new GuessLogicOne());
            $this->extrasences[] = new Extrasense('Mary', new GuessLogicTwo());
        }
        
        if ($roundHistory !== null) {
            $this->roundHistory = $this->unserializeHistory($roundHistory);
        } else {
            $this->roundHistory = new RoundHistory();
        }
    }
    
    public function actionGuess()
    {
        foreach ($this->extrasences as $extrasence)
        {
            $extrasence->guess();
        }
        
        $this->saveToSession();
        
        return $this->getStatistic();
    }
    
    public function actionAcuracy(int $number) 
    {
        foreach ($this->extrasences as $extrasence)
        {
            $extrasence->calculateAcuracy($number);
        }
        
        $this->roundHistory->setRound($number, $this->extrasences);
        
        $this->saveToSession();
        
        return $this->getStatistic();
    }
    
    public function getStatistic(): array
    {
        $statistic = [];
        
        foreach ($this->extrasences as $extrasence)
        {
            $extrasenceName = $extrasence->getName();
            
            $statistic[]= [
                'name' => $extrasenceName,
                'guess' => $extrasence->getGuessed(),
                'acuracy' => $extrasence->getAcuracy()
            ];       
        }
        
        return $statistic;
    }
    
    public function actionHistory()
    {
        return $this->roundHistory->getRounds();
    }
    
    public function actionClear()
    {
        $this->session->removeAll();
    }
    
    private function saveToSession(): void
    {
        $this->session->set('extrasences', $this->serializeExtrasences());
        $this->session->set('round_history', $this->serializeHistory());
    }
    
    private function serializeExtrasences(): string
    {
        return serialize($this->extrasences);
    }
    
    private function unserializeExtrasences(string $str): array
    {
        return unserialize($str);
    }
    
    private function serializeHistory(): string
    {
        return serialize($this->roundHistory);
    }
    
    private function unserializeHistory(string $str): object
    {
        return unserialize($str);
    }
}
