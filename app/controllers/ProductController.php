<?php

namespace app\controllers;

use app\models\Product;

/**
 * Description of PageController
 *
 * @author Sergey
 */
class ProductController extends AppController
{

    public function indexAction() 
    {
        $id = (int)$this->route['id'];
        $productModel = new Product();
        $product = $productModel->getOneById($id);
        //debug($product);die;
        $this->setData(compact('product'));
    }

}
