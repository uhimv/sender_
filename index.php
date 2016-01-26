<?php
include 'sender/Queue.php';

use sender\Queue;


$obj = new Queue();

//установить кол-во секунд для паузы между пачками
$obj->setSleepTime(1); 
//установить кол-во пакетов после которых скрипт приостановит выполнение, на кол-во секунд = $sleepTime
$obj->setCountPackageSleep(100); 

$package ='{ 
                    "0" : {
                        "user": {
                            "id": "Уникальный ID игрока", 
                            "name": "имя игрока", 
                            "credential": "mekisboun7@gmail.com"
                        },
                        "channel": "email", 
                        "notification": {
                            "subject": "Тема письма",
                            "body": "Текст письма"
                        }
                    },
                    "1" : {
                        "user": {
                            "id": "Уникальный ID игрока 2", 
                            "name": "имя игрока 2", 
                            "credential": "mekisboun7@gmail.com"
                        },
                        "channel": "email", 
                        "notification": {
                            "subject": "Тема письма 2",
                            "body": "Текст письма 2"
                        }
                    }
                }';
$obj->setPackage($package);
$obj->run();