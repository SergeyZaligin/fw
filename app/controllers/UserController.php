<?php

namespace app\controllers;

use engine\App;
use app\models\User;
use engine\base\View;

/**
 * Description of UserController
 *
 * @author Sergey
 */
class UserController extends AppController 
{

    public function signupAction() 
    {
        View::setMeta("Регистрация", "Регистрация", "Регистрация");
        
        
            
            $userModel = new User();
            if($this->isAjax()) {
                
                
                $data = App::$app->request->post;
                $userModel->load($data);
                
                if (!$userModel->validate($data) || !$userModel->checkUnique()){
                    $status = "=====Error validation=====";
                    $this->loadView('ajaxSignup', $status);
                    
                    //$userModel->getErrors();
                    //App::$app->request->session['form_data'] = $data;
                    
                }else{
                    $status = "=====Success validation=====";
                    $userModel->attributes['password'] = password_hash($userModel->attributes['password'], PASSWORD_DEFAULT);
            
                    if ($userModel->attributes['role'] === 'admin') {
                        $userModel->attributes['role'] = 'register';
                    }

                    if ($userModel->insert($userModel->attributes['login'], $userModel->attributes['email'], $userModel->attributes['password'], $userModel->attributes['role'] )) {

                        App::$app->request->session['validate_success'] = 'Вы успешно зарегистроированы!';
                        $this->loadView('ajaxSignup', $status);
                    } else {

                        App::$app->request->session['validate_errors'] = 'Ошибка при регистрации! ';

                    }
                }
                    
                
            }
            
            
            //debug($userModel->save('user'));
            //die;
            
            
            
            
            //redirect();
        
    }
        
    public function loginAction() 
    {
        if (!empty(App::$app->request->post) && isset(App::$app->request->post)) {
            $userModel = new User();
            //$userModel->checkSql();
            //debug($userModel->checkSql($_POST['login']));
            //die;
            if ($userModel->login(App::$app->request->post['login'])) {
                App::$app->request->session['validate_success'] = 'Вы вошли на сайт!';
            } else {
                App::$app->request->session['validate_errors'] = 'Логин или пароль введены не верно!';
            }
            redirect();
         }
    }
        
    public function logoutAction() 
    {
        if (isset(App::$app->request->session['user'])) {
            unset(App::$app->request->session['user']);
            redirect();
        }
    } 
    
    
}
