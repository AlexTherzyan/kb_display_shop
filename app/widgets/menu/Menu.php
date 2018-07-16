<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 30.03.2018
 * Time: 13:15
 */

namespace app\widgets\menu;

//создается выпадающее меню
use display_shop\App;
use display_shop\Cache;

class Menu{


    protected $data;
    //массив дерева
    protected $tree;
    protected  $menuHtml;
    //хранится шаблон для меню
    protected $tpl;
    protected $container = 'ul';
    protected $class = 'menu';
    //таблица из бд
    protected $table = 'category';
    protected $cache = 3600;
    protected $cacheKey = 'display_menu';
    protected $attrs = [];
    protected $prepend = '';

    // заполняет недостающие свойства и получает опции
    public  function __construct($options = []){

        $this ->tpl = __DIR__ . 'menu_tpl/menu.php';
        $this ->getOptions($options);
        //debug($this->table);
        $this ->run();
    }

    //получает опции
    protected function getOptions($options){
        foreach ($options as $key => $value){
            if (property_exists($this,$key)){
                $this->$key = $value;
            }
        }
    }

    //формирует меню
    protected function run(){

        $cache = Cache::instance();
        $this->menuHtml = $cache->get($this->cacheKey);

        //если не получили данные из кэша выводим мен.
        if (!$this->menuHtml){
            $this->data = App::$app->getProperty('cats');
            //если данные не получены, то получаем из БД
            if (!$this->data){
                $this->data = \R::getAssoc("SELECT * FROM ($this->table)");
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);

            //кэшируем
            if ($this->cache){
                $cache->set($this->cacheKey,$this->menuHtml,$this->cache);
            }
        }
        $this->output();
    }

    protected  function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach ($this->attrs as $key => $value){
                $attrs .= "$key= '$value' ";
            }
        }
        echo "<{$this->container} class='{$this->class}' $attrs>";
            echo $this->prepend;
            echo $this->menuHtml;
        echo "</{$this->container}>";

    }

    //получаем дерево
    protected function getTree(){
        $tree = [];
        $data = $this ->data;
        foreach ($data as $id =>&$node){
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }

        return $tree;
    }

    protected function getMenuHtml($tree,$tab = ''){
        $str =  '';
        foreach ($tree as $id => $category){
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    //берем категорию и по шаблону формируем html код
    protected function catToTemplate($category, $tab, $id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }


}



































