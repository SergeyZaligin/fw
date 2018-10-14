<?php

namespace app\controllers;

/**
 * Description of PageController
 *
 * @author Sergey
 */
class ProductController extends AppController
{

    public function indexAction() 
    {
        var_dump($this->route['id']);
    }

}
