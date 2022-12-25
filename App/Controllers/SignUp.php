<?php

namespace App\Controllers;

use Core\View;
use \App\Models\User;

class Signup extends \Core\Controller{
    
    public function newAction(){
        View::renderTemplate('Signup/new.html');
    }

    public function createAction(){
        $user = new User($_POST);
        if ($user->save()){
            //redirect to success site:
            //header('Location: http://'.$_SERVER['HTTP_HOST'].'/signup/success', true, 303);
            //exit;
            $this->redirect('/signup/success');
        } else {
            View::renderTemplate('Signup/new.html', ['user' => $user]);
        }
    }

    public function successAction(){
        View::renderTemplate('Signup/success.html');
    }
}

?>