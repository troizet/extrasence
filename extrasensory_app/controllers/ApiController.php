<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use app\models\Extrasense;
use app\models\GuessLogicOne;
use app\models\GuessLogicTwo;
use yii\rest\Controller;
use Yii;

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
    
    private $session;
    
    public function init()
    {
        $this->session = Yii::$app->session;
        
        $extrasences = $this->session->get('extrasences');
        
        //var_dump($extrasences);
        //print_r('hi');
        //die();
        
        if (!empty($extrasences)) {
            $this->extrasences = $this->unserializeExtrasences($extrasences);
            //print_r($this->extrasences);
        } else {
            $this->extrasences[] = new Extrasense('John', new GuessLogicOne());
            $this->extrasences[] = new Extrasense('Mary', new GuessLogicTwo());
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
    
    public function actionAccuracy(int $number) 
    {
        foreach ($this->extrasences as $extrasence)
        {
            $extrasence->calculateAccuracy($number);
        }
        
        $this->saveToSession();
        
        return $this->getStatistic();
    }
    
    public function getStatistic(): array
    {
        $statistic = [];
        
        foreach ($this->extrasences as $extrasence)
        {
            $extrasenceName = $extrasence->getName();
            
            $statistic[$extrasenceName]['guess'] = $extrasence->getGuessed();
            $statistic[$extrasenceName]['accuracy'] = $extrasence->getAccuracy();
        }
        
        return $statistic;
    }
    
    private function saveToSession(): void
    {
        $this->session->set('extrasences', $this->serializeExtrasences());
    }
    
    private function serializeExtrasences(): string
    {
        return serialize($this->extrasences);
    }
    
    private function unserializeExtrasences(string $str): array
    {
        return unserialize($str);
    }
}
