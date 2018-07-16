<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 26.03.2018
 * Time: 16:15
 */

namespace app\controllers;


use display_shop\base\Controller;
use display_shop\base\View;
use display_shop\Cache;

class MainController extends AppController
{

    //public $layout = 'default';
    public function  indexAction(){
        // получаем брэнды (только 9 записи)
        $brands = \R::find('brand', 'LIMIT 9' );
        // получаем хиты (только 8 записи)
        $hits = \R::find('product',"hit = '1' AND status = '1' LIMIT 8");
        //добавление матаданных на страницу
        $this->setMeta('Главная страница', 'Описание...', 'Ключевики...');
        $this->set(compact('brands', 'hits'));
    }

}