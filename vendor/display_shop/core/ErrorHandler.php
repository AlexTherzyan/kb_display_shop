<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 24.03.2018
 * Time: 14:20
 */

namespace display_shop;


class ErrorHandler
{
    public function __construct()
    {
        if(DEBUG)//указывает как ведет себя приложения
        {
            error_reporting(-1);
        }
        else error_reporting(0); //скрываем показ

        set_exception_handler([$this, 'exceptionHandler']);

    }

    public function exceptionHandler($obj){
        $this -> logErrors($obj -> getMessage(),$obj -> getFile(),$obj -> getLine());
        $this -> displayError('Исключение', $obj -> getMessage(),$obj -> getFile(),
            $obj -> getLine(), $obj -> getCode());
    }

    protected function logErrors($message = '', $file = '', $line = ''){
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки:
         {$message} | файл: {$file} | строка: {$line} 
            \n=============================================================\n ",
            3, ROOT . '/tmp/errors.log'); // запись ошибок в файл
    }

    protected function displayError($errno, $errstr, $errfile, $errline, $response = 404){

        http_response_code($response);
        if($response == 404 && !DEBUG) {
            require WWW . '/errors/404.php';
            die;
        }
        if(DEBUG) { //  если в режиме разработчика
            require  WWW . '/errors/dev.php';
        }
        else require  WWW . '/errors/prod.php';

        die; //завершаем выполнение
    }
}












