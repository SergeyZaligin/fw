<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use engine\libs\Breadcrumbs;
use engine\libs\Common;
use engine\base\View;

/**
 * Description of PageController
 *
 * @author Sergey
 */
class ProductController extends AppController
{

    public function indexAction() 
    {
        View::setMeta('Индекс пейдж', "Это описание индекс пейдж", "Это кейвордс");
        
        $productId = (int)$this->route['id'];
        
        $productModel = new Product();
        $categoryModel = new Category();
        
        $product = $productModel->getOneById($productId);
        $productId = (int)$product->id;
        $categoryId = $product->parent;
        $productTitle = $product->title;
        $categoryArray = $categoryModel->getAllKeysById();
        
        $comments = $productModel->getCommentsById($productId);
        
        $commentsTree = Common::getTree($comments);
        
        $commentsHTML = Common::getMenuHtml($commentsTree); 
        
        //debug($commentsHTML);die;
        //debug($this->route);die;
        
        
        $breadcrumbs = new Breadcrumbs($categoryArray, $categoryId, $productId, $productTitle);
        
        $this->setData(compact('product', 'breadcrumbs', 'commentsHTML'));
    }

}
