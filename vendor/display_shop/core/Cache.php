<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 29.03.2018
 * Time: 11:34
 */

namespace display_shop;

//нужен для кеширования данных
class Cache
{
    use TSingletone;

    //
    public function set($key, $data,$second = 3600){
        if ($second){
            $content['data'] = $data;
            $content['end_time'] = time() + $second;

            if(file_put_contents(CACHE .'/' . md5($key) . '.txt', serialize($content))){//кэшируем данные в файл
                return true;

            }
        }
        return false;
    }

    // получаем данные из кэша по ключу
    public function get($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)){
            $content = unserialize(file_get_contents($file));
            //проверяем не устарели ли кэшированные данные
            if(time() <= $content['end_time']){
                return $content['data'];
            }
            //иначе удалим файл, кэш устарел
            unlink($file);
        }
        return false;
    }

    //очищаем кэш
    public function delete(){
        $file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($file)){
            $content = unserialize(file_get_contents($file));
            //проверяем не устарели ли кэшированные данные
            if(time() <= $content['end_time']){
                return $content;
            }
            //иначе удалим файл, кэш устарел
            unlink($file);
        }
    }


}