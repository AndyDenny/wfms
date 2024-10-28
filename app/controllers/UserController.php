<?php


namespace app\controllers;
use app\models\User;


class UserController extends AppController{

    public function signupAction(){
        if(!empty($_POST)){
            $user = new User();
            $data = $_POST;
            $user->load($data);
            if (!$user->validate($data) || !$user->checkUnique() ){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if($user->save('user')){
                    $_SESSION['success'] = 'New user registered';
                }else{
                    $_SESSION['error'] = 'User register wrong';
                }
            }
            redirect();
        }
        $this->setMeta('Registration');
    }
    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if ($user->login()){
                $_SESSION['success'] = 'Login success!';
            }else{
                $_SESSION['error'] = 'Login or password wrong!';
            }
            redirect();
        }
        $this->setMeta('Login user');
    }
    public function logoutAction(){
        if($_SESSION['user']) unset($_SESSION['user']);
        redirect();
    }

}