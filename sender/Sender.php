<?php
namespace sender;

include 'sender/Notificationemail.php';
include 'sender/User.php';
include 'sender/Sendemail.php';

use sender\Notificationemail;
use sender\User;
use sender\Sendemail;
/* 
 * 
 */
class Sender {
    
    //принимаемый пакет
    protected $_package;
    
    public function setPackage($package) {
        $this->_package = $package;
        
        return $this;
    }
    
    public function getPackage() {
        return $this->_package;
    }
    
    /*
     * Метод класска который принимает решение 
     * что делать с пакетом для отправки уведомления
     */
    public function run() {
        $package = $this->getPackage();
        //модель получателя сообщения
        $objUser    = new User ($package->user);
        
        //определяем тип отправляемого сообщения 
        switch ($package->channel) {
            case 'email';
                //модель уведомления для Email
                $objNot     = new Notificationemail ($package->notification);
                //отправляем сообщение
                Sendemail::send ($objUser, $objNot);
                
                break;
            case 'fb';
                // FB notification
                break;
            case 'push';
                //mobile push notifications
                break;
            default :
                //throw new Exception('неизвестный тип сообщения');
                break;
        }
    }
}
