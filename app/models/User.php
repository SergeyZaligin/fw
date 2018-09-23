<?php

namespace app\models;


/**
 * Description of User
 *
 * @author Sergey
 */
class User extends AppModel
{
    public $attributes = [
        'name' => '',
        'login' => '',
        'password' => '',
        'email' => '',
        'role' => 'user'
        
    ];
    public $rules = [
        'required' => [
            'name',
            'login',
            'password',
            'email'
        ],
        'email' => [
            'email'
        ],
        'lengthMin' => [
            [
             'password',
             6
            ]
        ]
    ];
    
    public function insert($name, $login, $email, $password) 
    {
        return $this->db->query(
        "INSERT INTO user (name, login, email, password) VALUES (:name, :login, :email, :password)", [
            'name' => $name,
            'login' => $login,
            'email' => $email,
            'password' => $password,
        ]);
    }
    
    public function checkUnique() 
    {
        $user = $this->db->query("SELECT * FROM user WHERE login=:login OR email=:email", [
            'login' => $this->attributes['login'],
            'email' => $this->attributes['email']
        ], \PDO::FETCH_CLASS);
//        $user = R::findOne('user', 'login = ? OR email = ? LIMIT 1', [
//            $this->attributes['login'],
//            $this->attributes['email']
//        ]);
        if (!empty($user)) {
            if ($this->attributes['login'] === $user->login) {
                $this->errors['unique'][] = "Логин {$user->login} занят!";
            }
            if ($this->attributes['email'] === $user->email) {
                $this->errors['unique'][] = "Логин {$user->email} занят!";
            }
            return false;
        } else {
            return true;
        }
    }
    
    public function checkSql($login) 
    {
        $user = $this->db->query("SELECT * FROM user WHERE login=:login LIMIT 1", [
            'login' => $login
        ], \PDO::FETCH_CLASS);
        return $user[0];
    }


    public function login($login) 
    {
        $login = !empty(trim($_POST['login'])) ? trim($_POST['login']) : null;
        $password = !empty(trim($_POST['password'])) ? trim($_POST['password']) : null;

        if ($login && $password) {
            $query = $this->db->query("SELECT * FROM user WHERE login=:login LIMIT 1", [
            'login' => $login
        ]);
//debug($user);
//die;
//            //$user = R::findOne('user', 'login = ? LIMIT 1', [$login]);
            $user = $query[0];
            if ($user) {
                if (password_verify($password, $user->password)) {
                    foreach ($user as $key => $value) {
                        if ($key !== 'password') {
                            $_SESSION['user'][$key] = $value;
                        }
                    }
                    return true;
                }
                
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
