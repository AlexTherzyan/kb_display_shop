<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26.03.2018
 * Time: 19:31
 */

namespace display_shop\base;

/*
 * Базовый класс вида
 */
use display_shop\App;

class View
{
    public $route; // содержится массив с текущим маршрутом

    public $controller;
    public $view;
    public $model;
    public $layout; //хранится шаблон страницы
    public $prefix;
    public $data = []; // данные котороые будем передавать
    public $meta = []; // хранятся метаданные

    public function __construct($route, $layout = '', $view = '', $meta)
    {
        $this -> route = $route;
        $this -> controller = $route['controller'];
        $this -> model = $route['controller'];
        $this -> view = $view;
        $this -> prefix = $route['prefix'];
        $this -> meta = $meta;

        if($layout === false) //  если шаблон отключен, то не показываем его
        $this -> layout = false;
        else $this -> layout = $layout ?: LAYOUT;  // елси передан какой-то шаблон, то берем его, иначе значение по умолчанию


    }


        /*
         * метод формирует страницу для пользователя
         * вызывается в контроллере
         */
        public function  render($data){

            //проверяем являюттся ли наши данные массивом
            if(is_array($data)) extract($data);//извлекаем данные из массива

            $viewFile = APP . "/views/{$this->prefix}{$this->controller}/{$this->view}.php";

            if(is_file($viewFile)) {// если существует такой файл
                ob_start(); //включаем буферизацию
                require_once $viewFile;
                $content = ob_get_clean(); //  (хранится вид)
            }
             else throw new \Exception("Не найден вид $viewFile",500);

            //подключаем шаблон
            if(  false !== $this->layout){

                 $layoutFile = APP . "/views/layouts/{$this->layout}.php";
                //require_once $layoutFile;
                if (is_file($layoutFile)){
                    require_once $layoutFile;
                }else throw new \Exception("Не найден шаблон {$this->layout}",500);
            }
        }

        public function getMeta(){

            $output =  '<title>' . $this->meta['title'] . '</title>' .PHP_EOL;
            $output .=  '<meta name="description" content="'. $this->meta['description'].'">'.PHP_EOL;
            $output .=  '<meta name="keywords" content="'. $this->meta['keywords'].'">'.PHP_EOL;
            return $output;
        }


}














