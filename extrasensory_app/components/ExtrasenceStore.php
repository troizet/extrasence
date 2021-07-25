<?php

namespace app\components;

use app\factory\ExtrasenceFactory;
use app\factory\HistoryFactory;
use app\interfaces\StoreInterface;
use Yii;

class ExtrasenceStore implements StoreInterface {
    
    private $session;
    
    public function __construct() {
        $this->session = Yii::$app->session;
    }
    
    public function getExtrasences(): array
    {
        $extrasences = $this->session->get('extrasences');
                
        if (!empty($extrasences)) {
           return unserialize($extrasences);
        } else {
           return ExtrasenceFactory::getExtrasences();
        }
    }
    
    public function getHistory(): object
    {
        $roundHistory = $this->session->get('round_history');
        if ($roundHistory !== null) {
            return unserialize($roundHistory);
        } else {
            return HistoryFactory::getHistory();
        }
    }
    
    public function setExtrasences(array $extrasences): void
    {
        $this->session->set('extrasences', serialize($extrasences));
    }
    
    public function setHistory($history): void
    {
        $this->session->set('round_history', serialize($history));
    }
    
    public function clear(): void
    {
        $this->session->removeAll();
    }
}