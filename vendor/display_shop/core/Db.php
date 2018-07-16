<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 28.03.2018
 * Time: 15:19
 */

namespace display_shop;

/*
 *  устанавливается подключение к бд
 *  класс реализует паттерн singleton
 */

class Db{

    use TSingletone;

    protected function __construct(){

        $db = require_once CONFIG . '/db_config.php';

        class_alias('\RedBeanPHP\R','\R');

        //подключаемся к бд
        \R::setup($db['dsn'],$db['user'],$db['password']);

        //проверяем на соединение с бд
        if (!\R::testConnection()){
            throw new \Exception('Нет соединения с бд', 500);
        }

        //запрещаем изменять бд
        \R::freeze(true);
        if (DEBUG){
            \R::debug(true,1);
        }
    }
}