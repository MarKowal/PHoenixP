<?php
namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use \App\Auth;


class Login extends \Core\Controller{
    public function newAction(){
        View::renderTemplate('Login/new.html');
    }

    public function createAction(){
        //echo ($_REQUEST['email'].', '.$_REQUEST['password']);
        //$user = User::findByEmail($_POST['email']);
        //var_dump($user);

        $user = User::authenticate($_POST['email'], $_POST['password']);

        if($user){
            //header('Location: http://'.$_SERVER['HTTP_HOST'].'/', true, 303);
            //exit;

            //delete the old session id number:
            Auth::login($user);
            $this->redirect('/');
        } else{
            View::renderTemplate('Login/new.html', ['email' => $_POST['email'], ]);
        }
    }

    public function destroyAction(){
        Auth::logout();
        $this->redirect('/');
    }

}
 
?>