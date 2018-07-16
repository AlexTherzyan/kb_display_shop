<?php

    define("DEBUG", 1); //отвечает за то  в каком режиме мы работаем (разработка(1) или продакшн(0))
    define("ROOT", dirname(__DIR__)); // указывает на корень сайта
    define("WWW", ROOT . '/public'); // указывает на публичную часть сайта
    define("APP", ROOT . '/app'); // ведет к папке app
    define("WWW", ROOT . '/vendor/display_shop/core'); // указывает на ядро сайта
    define("LIBS", ROOT . '/vendor/display_shop/core/libs'); // указывает на ...(по аналогии)
    define("CACHE", ROOT . '/tmp/cache'); // указывает на папку кэша
    define("CONFIG", ROOT . '/config'); // указывает на конфигурационные файлы
    define("LAYOUT",  'display'); // указывает на шаблон сайта

    // http://display-shop/public/index.php
    $app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";

    // http://display-shop/public/
    $app_path = preg_replace("#[^/]+$#",'',$app_path); //ищем все символы начина с конца строки кроме слеша

    //http://display-shop
    $app_path = str_replace('/public/','',$app_path);

    define("PATH",$app_path);
    define("ADMIN", PATH . "/admin"); // путь к админке

    //подключим автозагрузочник composer
    require_once ROOT . '/vendor/autoload.php';
