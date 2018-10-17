<?php

namespace app\controllers;

use engine\App;
use app\models\Product;
use app\models\Category;
use engine\libs\Breadcrumbs;
use engine\libs\Common;
use engine\base\View;
use app\models\Comment;

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
        $commentModel = new Comment();
        $categoryModel = new Category();
        
        
        if ($this->isAjax()) {
            
            $this->layout = false;
            
            $data = App::$app->request->post;
            
            //debug($data);die;
            
            $commentModel->load($data);
            
            if (!$commentModel->validate($data)){
                $status = "=====Error validation=====";
                $this->loadView('commentAjax', $status);
            }else{
                $status = "=====Success validation=====";

                if ($commentModel->insert(
                            $commentModel->attributes['comment_author'], 
                            $commentModel->attributes['comment_text'], 
                            $commentModel->attributes['parent'], 
                            $commentModel->attributes['productId'])
                        ) {
                    $lastCommentId = $commentModel->lastCommentId; 
                    $status .= $lastCommentId;
                    $this->loadView('commentAjax', $status);
                } else {
                    $_SESSION['validate_errors'] = 'Ошибка при добавлении комментария! ';
                }
            }
        }
        
        
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
