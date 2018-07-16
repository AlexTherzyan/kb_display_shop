<?php
/**
 * Created by PhpStorm.
 * User: Андрей
 * Date: 24.03.2018
 * Time: 11:55
 */

function debug($arr){ //красивая распечатка

    echo '<pre>' . print_r($arr,true) . '</pre>';

}

function redirect($http = false){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit;
}