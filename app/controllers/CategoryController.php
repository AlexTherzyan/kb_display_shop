<?php


namespace app\controllers;


use app\models\Breadcrumps;
use app\models\Category;
use app\models\Product;
use display_shop\App;
use display_shop\libs\Pagination;

class CategoryController extends AppController
{

    public function  viewAction(){


        // получаем алиас из маршрута
        $alias = $this->route['alias'];


        $category = \R::findOne('category', 'alias = ?', [$alias]);
        if(!$category){
            throw new \Exception('Страница не найдена',404);
        }


        // хлебные крошки
        $breadcrumbs = Breadcrumps::getBreadcrumbs($category->id);

        $cat_model = new Category();
        $ids = $cat_model->getIds($category->id);

        // если категорий нету, то ложим  $category->id)
        $ids = !$ids ? $category->id : $ids . $category->id;

        // номер текущей страницы
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1 ;
        // колво товаров на страницу
        $perpage = App::$app->getProperty('pagination');
        $total = \R::count('product', "category_id IN ($ids)");
        $pagination = new Pagination($page, $perpage, $total);
        $start = $pagination->getStart();


        //выводим все продукты  которые совпадают со значением номера нажатой категории
        $products = \R::find('product', "category_id IN ($ids) LIMIT $start, $perpage");

        //передаем данные в вид
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products','breadcrumbs', 'pagination', 'total'));
    }

}




















