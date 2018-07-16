<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 19.04.2018
 * Time: 14:48
 */

namespace app\models;

use display_shop\App;

class Category  extends AppModel
{

    // получаем id вложенных категорий

    public function getIds($id){

        //получаем массив категорий
        $cats = App::$app->getProperty('cats');
        $ids = null;

        foreach ($cats as $k => $v){

            if($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }

        }
        return $ids;
    }

}