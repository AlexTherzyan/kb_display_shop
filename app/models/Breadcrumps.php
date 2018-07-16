<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 14.04.2018
 * Time: 9:44
 */

namespace app\models;


use display_shop\App;

class Breadcrumps{

    //получим все категории
    public static function getBreadcrumbs($category_id, $name = ''){

        $cats = App::$app->getProperty('cats');
        $breadcrumbs_array = self::getParts($cats, $category_id);

        $breadcrumbs = "<li><a href='".PATH."'>Главная</a></li>";
        if ($breadcrumbs_array){
            foreach ($breadcrumbs_array as $alias => $title){
                $breadcrumbs .= "<li><a href='". PATH."/category/{$alias}'>{$title}</a></li>";
            }
        }

        if ($name){
            $breadcrumbs.= "<li>$name</li>";
        }
        return $breadcrumbs;
    }


    // получаем массив дерева навигации(хлебные крошки)
    public static function getParts($cats, $id){

        if (!$id){
            return false;
        }
        //ложим категории
        $breadcrumbs = [];

        foreach ($cats as $key =>$value ){

            if (isset($cats[$id])){
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            }
            else break;

        }
        return array_reverse($breadcrumbs, true);
    }


}