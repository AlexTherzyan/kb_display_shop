<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 26.03.2018
 * Time: 19:23
 */

namespace app\controllers;

/*
 * общий контроллер для всего приложения
 */
use app\models\AppModel;
use display_shop\App;
use display_shop\base\Controller;
use display_shop\Cache;

class AppController extends Controller{

    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();//утсановим соединение с бд

        //ложим в контейнер
        App::$app->setProperty('cats', self::cacheCategory());
    }

    public static function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        //если не получили данные из кэша, то возвращаем их из БД
        if(!$cats){
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache ->set('cats',$cats);
        }
        return $cats;
    }

}