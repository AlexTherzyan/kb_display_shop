<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 26.04.2018
 * Time: 14:34
 */

namespace app\controllers;


class SearchController
{

    public function typeaheadAction(){
        if ($this->isAjax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']): null;
            if ($query){
                $products = \R::getAll('SELECT id, title FROM product WHERE title LIKE ? LIMIT 9', ["%{$query}%"]);
                echo json_encode($products);
            }

        }
        die;
    }

}