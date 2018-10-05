<?php

namespace app\controllers;

use app\models\Post;
use engine\libs\Pagination;
use engine\base\View;

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
        
        $modelUser = new Post();
        $total = $modelUser->count();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 2;
        $pagination = new Pagination($page, $perPage, $total);
        $start = $pagination->getStart();
        $posts = $modelUser->getAll($start, $perPage);
        $this->setData(compact('posts', 'pagination'));
    }
    
    public function testAction() 
    {
        if ($this->isAjax()) {
            echo 'isAjax!!!';
            die;
        }
        View::setMeta('Test пейдж', "Это описание test пейдж", "Это кейвордс");
    }
}
