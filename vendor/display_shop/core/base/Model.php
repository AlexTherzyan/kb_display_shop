<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 28.03.2018
 * Time: 15:05
 */

namespace display_shop\base;

/*
 * отвечает за работу с данными
 */
use display_shop\Db;

abstract class Model
{
    //хранится массив свойств модели, который идентичен полям в БД
    public $attributes = [];
    public $errors = [];
    //правила валидации данных
    public $rules = [];

    //организовываем подключение к бд
    public function __construct(){

        Db::instance();

    }
}