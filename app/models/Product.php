<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 13.04.2018
 * Time: 9:11
 */

namespace app\models;

/*
 * работа с просмотренными товарами
 */
class Product extends AppModel
{

    //добавляет просмотренный товар
    public function setRecentlyViewed($id){

        $recentlyViewed = $this->getAllRecentlyViewed() ;


        if (!$recentlyViewed){

            setcookie("recentlyViewed",$id,time() + 3600*24, '/');

        }else{

            $recentlyViewed = explode('.',$recentlyViewed);
            //проверяем есть ли данный товар в куки
            if (!in_array($id,$recentlyViewed)){
                //если нет, то дописываем
                $recentlyViewed[] = $id;
                $recentlyViewed = implode('.',$recentlyViewed);
                setcookie('recentlyViewed',$recentlyViewed,time() + 3600*24, '/');
            }

        }
    }

    //получаем 3 просмотренных товара
    public function getRecentlyViewed(){

        if (!empty($_COOKIE['recentlyViewed'])){
            $recentlyViewed = $_COOKIE['recentlyViewed'];
            $recentlyViewed = explode('.',$recentlyViewed);

            //возвращаем 3 последних посещенных продукта
            return array_slice($recentlyViewed, -3);
        }
        return false;

    }
    //получаем все просмотренные товары
    public function getAllRecentlyViewed(){

        if(!empty($_COOKIE['recentlyViewed'])){
            return $_COOKIE['recentlyViewed'];
        }else{
            return false;
        }

    }
}