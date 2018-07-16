<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 24.03.2018
 * Time: 11:28
 */

namespace display_shop;


trait TSingletone
{
    private static $instance;

    public static function instance(){

        /*
         * если свойство пустое, то ложим в него обьект
         */
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }

}