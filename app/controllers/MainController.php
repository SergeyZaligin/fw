<?php

namespace app\controllers;

use app\models\Product;
use engine\libs\Pagination;
use engine\base\View;
use engine\App;
use engine\libs\Breadcrumbs;

/**
 * Description of MainController
 *
 * @author Sergey
 */
class MainController extends AppController
{

    public function indexAction() 
    {
        View::setMeta('Индекс пейдж', "Это описание индекс пейдж", "Это кейвордс");
        
        $modelProduct = new Product();
        $total = $modelProduct->count();
        $page = isset(App::$app->request->get['page']) ? (int) App::$app->request->get['page'] : 1;
        $perPage = 2;
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();
        
        $id = App::$app->request->get['category'];
        $products = $modelProduct->getAllByCategoryId($start, $perPage, $id);
        
        $pr = $modelProduct->get();
        $pr2 = [];
        foreach ($pr as $value) {
                $pr2[$value['id']] = $value;
        }
        //debug($pr2);
        $breadcrumbs = new Breadcrumbs($pr2, $id);
        
        $this->setData(compact('products', 'pagination', 'breadcrumbs'));
    }
    
}
