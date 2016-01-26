<?php
namespace sender;
/* 
 * отправка email
 */
class Sendemail {
    
    public static function send( User $objUser, Notificationemail $objNot) {
        
        $to         = $objUser->getUserCredential () ;
        $usetId     = $objUser->getUserId();
        $subject    = $objNot->getSubject (); 
        $message    = $objNot->getBody ();

//        $headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
//        $headers .= "From: Birthday Reminder <birthday@example.com>\r\n"; 
//        $headers .= "Bcc: birthday-archive@example.com\r\n"; 
        if(mail($to, $subject, $message)) {
            echo 'письмо отправлено пользователю id: '.$usetId.'<br>';
        } else {
            echo 'ошибка отправки письма пользователю id: '.$usetId.'<br>';
        }
    }
}
