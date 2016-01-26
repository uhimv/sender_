<?php
namespace sender;
/* 
 * модель User 
 */

class User {
    
    //уникальный ID игрока
    protected $_userId;
    
    //имя игрока
    protected $_userName;
    
    //адрес игрока, по которому будет отправлено уведомление
    protected $_userCredential;
    
    public function __construct ($obj) {
        $this->setUserId($obj->id);
        $this->setUserName($obj->name);
        $this->setUserCredential($obj->credential);
    }
    
    public function getUserId () {
        return $this->_userId;
    }
    
    public function getUserName () {
        return $this->_userName;
    }
    
    public function getUserCredential () {
        return $this->_userCredential;
    }
    
    public function setUserId ($userId) {
        $this->_userId = $userId;
    }
    
    public function setUserName ($userName) {
        $this->_userName = $userName;
    }
    
    public function setUserCredential ($userCredentia) {
        $this->_userCredential = $userCredentia;
    }
}