<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use engine\libs\Breadcrumbs;

/**
 * Description of PageController
 *
 * @author Sergey
 */
class ProductController extends AppController
{

    public function indexAction() 
    {
        $productId = (int)$this->route['id'];
        
        $productModel = new Product();
        $categoryModel = new Category();
        
        $product = $productModel->getOneById($productId);
        $productId = (int)$product->id;
        $categoryId = $product->parent;
        $productTitle = $product->title;
        $categoryArray = $categoryModel->getAllKeysById();
        
        $comments = $productModel->getCommentsById($productId);
        
        //debug($comments);die;
        //debug($this->route);die;
        
        
        $breadcrumbs = new Breadcrumbs($categoryArray, $categoryId, $productId, $productTitle);
        
        $this->setData(compact('product', 'breadcrumbs', 'comments'));
    }

}
