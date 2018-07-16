<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 24.03.2018
 * Time: 11:07
 */

namespace display_shop;


class App
{
    public static $app; // контейнер для нашего приложения

    public function __construct() //конструктор
    {

        $query = trim($_SERVER['QUERY_STRING'], '/'); //получаем строку запроса без слеша

        session_start();

        self::$app = Registry::instance();//контейнер в котором записан обьект реестра

        $this -> getParams();

        //вызываем обькт класса исключений
        new ErrorHandler();

        //передаем адрес
        Router::dispatch($query);
    }

    protected function getParams(){
        $params = require_once CONFIG . '/params.php';
        if(!empty($params)) {
            foreach ($params as $key => $value){
                self::$app -> setProperty($key, $value);
            }

        }
    }
}