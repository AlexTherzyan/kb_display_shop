<?php
/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 12.04.2018
 * Time: 10:55
 */

namespace app\controllers;

/*
 *  Карточка товара
 */

use app\models\Breadcrumps;
use app\models\Product;

class ProductController extends AppController
{
    //--------------------------------------------- просматриваем конкретный товар по алиасу
    public function viewAction(){



        $alias = $this->route['alias'];
        $product = \R::findOne('product', "alias = ? AND status = '1'", [$alias] );
        if(!$product){
            throw new \Exception('Страница не найдена',404);
        }

        //-------------------------------------------------------------------хлебные крошки
        $breadcrumbs = Breadcrumps::getBreadcrumbs($product->category_id,$product->title);
        //---------------------------------------------------------связанные товары(похожие)
        $related = \R::getAll("SELECT * FROM related_product JOIN product ON product.id = related_product.related_id WHERE related_product.product_id = ?",[$product->id]);

        //-----------------------------------------------запись в куки запрашиваемого товара
        $p_model = new Product();
        $p_model->setRecentlyViewed($product->id);

        //-------------------------------------------------------------просмотренные товары
        $r_viewed = $p_model->getRecentlyViewed() ;

        $recentlyViewed = null;
        if ($r_viewed){
            $recentlyViewed = \R::find('product','id IN ('. \R::genSlots($r_viewed).') LIMIT 3', $r_viewed);
        }

        //---------------------------------------------------------------------------галерея
        $gallery = \R::findAll('gallery',"product_id = ?", [$product->id] );


        //-----------------------------------------------------------------------модификации


        $this->setMeta($product->title, $product->description, $product->keywords);
        //передаем в шаблон
        $this->set(compact('product', 'related', 'gallery','recentlyViewed', 'breadcrumbs', 'charac'));


    }
}