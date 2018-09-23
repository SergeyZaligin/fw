<?php

namespace app\controllers;

use app\models\User;
/**
 * Description of UserController
 *
 * @author Sergey
 */
class UserController extends AppController 
{

    public function signupAction() 
    {
        $this->setMeta("Регистрация", "Регистрация", "Регистрация");
        
        if (!empty($_POST) && isset($_POST)) {
            $userModel = new User();
            $data = $_POST;
            $userModel->load($data);
//            debug($userModel->save('user'));
//            die;
            if (!$userModel->validate($data) || !$userModel->checkUnique()) {
                $userModel->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
            
            $userModel->attributes['password'] = password_hash($userModel->attributes['password'], PASSWORD_DEFAULT);
            
            if ($userModel->insert($userModel->attributes['name'], $userModel->attributes['login'], $userModel->attributes['email'], $userModel->attributes['password'])) {
                $_SESSION['validate_success'] = 'Вы успешно зарегистроированы!';
            } else {
                $_SESSION['validate_errors'] = 'Ошибка при регистрации! ';
            }
            redirect();
        }
    }
        
    public function loginAction() 
    {
        if (!empty($_POST) && isset($_POST)) {
            $userModel = new User();
            //$userModel->checkSql();
            //debug($userModel->checkSql($_POST['login']));
            //die;
            if ($userModel->login($_POST['login'])) {
                $_SESSION['validate_success'] = 'Вы вошли на сайт!';
            } else {
                $_SESSION['validate_errors'] = 'Логин или пароль введены не верно!';
            }
            redirect();
         }
    }
        
    public function logoutAction() 
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            redirect();
        }
    } 
    
    
}
