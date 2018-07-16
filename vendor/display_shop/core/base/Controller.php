<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26.03.2018
 * Time: 18:58
 */

namespace display_shop\base;

/*
 * базовый класс содержжащий общие методы для всех контроллеров
 */
abstract class Controller{

    public $route; // содержится массив с текущим маршрутом

    public $controller;
    public $view;
    public $model;
    public $layout;
    public $prefix;
    public $data = []; // данные котороые будем передавать
    public $meta = ['title' => '', 'description' => '', 'keywords' => '']; // хранятся метаданные

    public function __construct($route)
    {
        $this -> route = $route;
        $this -> controller = $route['controller'];
        $this -> model = $route['controller'];
        $this -> view = $route['action'];
        $this -> prefix = $route['prefix'];

    }

    //получает обьект и вызывает метод render
    public function getView(){
        $viewObject = new View($this -> route,$this -> layout,$this -> view, $this -> meta);
        $viewObject -> render($this->data) ;
    }

    public function set($data){
        $this -> data = $data;
    }

    public function setMeta($title = '', $description = '', $keywords = ''){
        $this-> meta['title'] = $title;
        $this-> meta['description'] = $description;
        $this-> meta['keywords'] = $keywords;
    }

}





















