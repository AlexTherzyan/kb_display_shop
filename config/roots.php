<?php
// находятся правила маршрутизации


/**
 * Created by PhpStorm.
 * User: a_terzjan
 * Date: 26.03.2018
 * Time: 13:41
 */

use  display_shop\Router;


//пользовательские правила пишутся всегда выше дефолтных
Router::add('^product/(?P<alias>[a-z0-9-]+)/?$', [ 'controller' => 'Product', 'action' => 'view' ]);


// маршрут для категорий
Router::add('^category/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);

// admin routes
Router::add('^admin$', [ 'controller' => 'Main', 'action' => 'index',
    'prefix' => 'admin']); // ^ - мета символ совпадает с началом строки, $ - с концом

Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);



// default routes
// 1 значение - шаблон, 2 - соответствие
Router::add('^$', [ 'controller' => 'Main', 'action' => 'index' ]); // ^ - мета символ совпадает с началом строки, $ - с концом
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');


