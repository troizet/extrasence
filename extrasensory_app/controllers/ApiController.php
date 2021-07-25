<?php

namespace app\controllers;

use app\factory\StoreFactory;
use yii\rest\Controller;

class ApiController extends Controller {
    
    /**
     *
     * @var ExtrasenceInterfaces[]
     */
    private $extrasences = [];
    
    /**
     *
     * @var HistoryInterface
     */
    private $roundHistory;
    
    private $store;
    
    public function init()
    {       
        $this->store = StoreFactory::getStore();
      
        $this->extrasences = $this->store->getExtrasences();
        $this->roundHistory = $this->store->getHistory();
    }
    
    public function actionGuess()
    {
        foreach ($this->extrasences as $extrasence)
        {
            $extrasence->guess();
        }
        
        $this->saveRound();
        
        return $this->getStatistic();
    }
    
    public function actionAcuracy(int $number) 
    {
        foreach ($this->extrasences as $extrasence)
        {
            $extrasence->calculateAcuracy($number);
        }
        
        $this->roundHistory->setRound($number, $this->extrasences);
        
        $this->saveRound();
        
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
        $this->store->clear();
    }
    
    private function saveRound(): void
    {
        $this->store->setExtrasences($this->extrasences);
        $this->store->setHistory($this->roundHistory);
    }
}
