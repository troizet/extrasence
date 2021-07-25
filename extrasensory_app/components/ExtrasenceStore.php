<?php

namespace app\components;


use Yii;
/**
 * Description of ExtrasenceStore
 *
 * @author krok
 */
class ExtrasenceStore {
    
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
            $ext = [];
            
            $ext[] = new Extrasense('John', new GuessLogicOne());
            $ext[] = new Extrasense('Mary', new GuessLogicTwo());
            
            return $ext;
        }
    }
    
    public function getHistory(): object
    {
        $roundHistory = $this->session->get('round_history');
        if ($roundHistory !== null) {
            return unserialize($roundHistory);
        } else {
            return new RoundHistory();
        }
    }
    
    public function setExtrasences(array $extrasences)
    {
        $this->session->set('extrasences', serialize($extrasences));
    }
    
    public function setHistory($history)
    {
        $this->session->set('round_history', serialize($history));
    }
}
