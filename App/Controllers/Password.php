<?php

namespace App\Controllers;

use App\Models\User;
use \Core\View;


class Password extends \Core\Controller{
    public function forgotAction(){
        View::renderTemplate('Password/forgot.html');
    
    }

    public function requestResetAction(){
        User::sendPasswordReset($_POST['email']);
        View::renderTemplate('Password/reset_requested.html');
    }

    public function resetAction(){
        $token = $this->route_params['token'];
        //echo $token;
        $user = User::findByPasswordReset($token);
        echo "<pre>"; 
        var_dump($user);
    }

}

?>