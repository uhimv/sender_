<?php
namespace sender;

include 'sender/Sender.php';
use sender\Sender;

// Очередь загрзки
class Queue {
    
    public $package = null;
    
    //кол-во секунд для паузы между пачками
    public $sleepTime = 1;
    
    //кол-во пакетов после которых скрипт приостановит выполнение, на кол-во секунд ($sleepTime)
    public $countPackageSleep = 100;
    
    public function setPackage($package) {
        $this->package = $package;
    }
    
    public function getPackage() {
        return $this->package;
    }
    
    public function getPackageAsObj() {
        return json_decode($this->package);
    }
    
    public function run () {
        
        $pac = $this->getPackageAsObj();
        
        if (!$pac) {
            echo 'Нет данных для отправки';
            return false;
        }
        
        $objSender = new Sender ();
        
        $i = 0;
        foreach ($pac as $val) {
            
            $objSender->setPackage($val)->run();
            
            $i++;
            if ($i == $this->countPackageSleep) {
                $i = 0;
                sleep($this->sleepTime);
            }
        }
    }
      
    public function setSleepTime($sleepTime) {
        $this->sleepTime = $sleepTime;
    }
    
    public function setCountPackageSleep($countPackageSleep) {
        $this->countPackageSleep = $countPackageSleep;
    }
}
