<?php
namespace sender;
/* 
 * модель уведомлений для email
 */

class Notificationemail {
    
    //Тема письма
    protected $_subject;
    
    //Текст письма
    protected $_body;

    public function __construct ($obj) {
        $this->setSubject($obj->subject);
        $this->setBody($obj->body);
    }
    
    public function getSubject () {
        return $this->_subject;
    }
    
    public function getBody () {
        return $this->_body;
    }
    
    public function setSubject ($subject) {
        $this->_subject = $subject;
    }
    
    public function setBody ($body) {
        $this->_body = $body;
    }
}