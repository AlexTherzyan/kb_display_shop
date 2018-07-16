<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 24.03.2018
 * Time: 11:20
 */

namespace display_shop;


class Registry // реализует патерн singleton
{

    use TSingletone; //вставляем трэйт синглтон

    protected static $properties = [];

    public  function setProperty($name, $value){
        self::$properties[$name] = $value;
    }

    /**
     * @return array
     */
    public  function getProperty($name)
    {
        if(isset(self::$properties[$name]))
            return self::$properties[$name];
        return null;
    }

    // распечатываем все доступные свойства
    public function getProperties(){
        return self::$properties;
    }

}