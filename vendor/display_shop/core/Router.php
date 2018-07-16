<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 26.03.2018
 * Time: 13:48
 */

// сравнивает поступивший запрос с имеющимися в нем маршрутами
// и вызывает контроллер если есть

namespace display_shop;


class Router
{
    protected static $routes = []; // хранится таблица маршрутов
    protected static $route = []; // хранится текущий маршрут


    public static function add($regexp, $route = []){ // записывает правило в таблицу маршрутов

        self::$routes[$regexp] = $route;

    }

    public static function getRoutes(){
        return self::$routes; //возвращ. маршруты
    }

    public static function getRoute(){
        return self::$route; //возвращ. текущий маршрут
    }

    public static function dispatch($url){
        $url = self::removeQueryString($url);

        if(self::matchRoute($url)){
            $controller = 'app\controllers\\' . self::$route['prefix'] .
               self::$route['controller'] . 'Controller';//ищем контроллеры в этой папке
            if(class_exists($controller)) {//
                $controllerObject = new $controller(self::$route);//создаем обьект и передаем текущий маршрут
                $action = self::lowerCamelCase( self::$route['action']) . 'Action';//вызываем актион контроллера

                if(method_exists($controllerObject,$action)){
                    $controllerObject->$action();
                    $controllerObject->getView(); //отрисовываем страницу
                }else{
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            }else{
                throw new \Exception("Контроллер $controller не найден", 404);
            }
        }
        else { // соответствие не найдено, выбрасываем исключение
            throw new \Exception("Страница не найдена", 404);
        }


    }

    public  static function matchRoute($url){ // ищет соответствие в таблице маршрутов
            foreach (self::$routes as $pattern => $route){

                if(preg_match("#{$pattern}#", $url, $matches)){//совпадение найдено

                    foreach ($matches as $key => $value) {
                        if (is_string($key)) {
                            $route[$key] = $value;
                        }
                    }

                    if (empty($route['action'])){ //если асtion не указан, то по умолчанию ставим index
                        $route['action'] = 'index';
                    }
                    if (!isset($route['prefix'])){
                        $route['prefix'] = '';
                    }
                    else{
                        $route['prefix'] = 'admin\\'; //!!!!!!!!!
                    }

                    $route['controller'] = self::upperCamelCase($route['controller']);
                    self::$route = $route; //сохраняем в текущий маршрут
                  //  debugdebug(self::$route);
                    return true;
                }
            }
            return false;
    }

    /*
     * манипуляции для преобразования url контроллера в нужный вид
     * CamelCase
     */
    protected static function upperCamelCase($name){
        $name = ucwords(str_replace('-',' ', $name));
        $name = str_replace(' ','', $name);
        return $name;
    }

    //CamelCase -> camelCase
    protected static function lowerCamelCase($name){
        return lcfirst(self::upperCamelCase($name));
    }

    /*
     * разделяет адресную строку на 2 части
     *  до & и после
     */
    protected static function removeQueryString($url){

        if ($url){
            $params = explode('&',$url,2);
            if (false === strpos($params[0], '=')){
                return rtrim($params[0], '/');
            }else{
                return  '';
            }
        }
    }
}
























































