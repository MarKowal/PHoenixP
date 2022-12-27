<?php

namespace App\Controllers;

use \Core\View;
use \App\Auth;

class Items extends \Core\Controller{

    public function indexAction(){

        if (! Auth::isLoggedIn()){
            //exit('access denied');
            $this->redirect('/login');
        } else{
            View::renderTemplate('Items/index.html');
        }
    }

}


?>