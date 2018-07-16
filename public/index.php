<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22.03.2018
 * Time: 21:22
 *
 *  это front-controller, является точкой входа пользователя
 */

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONFIG . '/roots.php';

//echo "Hello!";
//var_dump($_SERVER['QUERY_STRING']); // выводит URL после основного насзвания

new \display_shop\App(); // экземпляр класса

//debug( \display_shop\App::$app -> getProperties()); //выведет все свойства

// имитируем ошибку
//throw new Exception('Страница не найдена', 500);


//debug(\display_shop\Router::getRoutes());// получаем маршруты



