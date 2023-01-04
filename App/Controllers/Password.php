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

        $user = $this->getUserOrExit($token);

        $user = User::findByPasswordReset($token);
        
        View::renderTemplate('Password/reset.html', ['token' => $token]);
    }

    public function resetPasswordAction(){
        $token = $_POST['token'];

        $user = $this->getUserOrExit($token);

        echo "(here will be reset users passowrd)";
    }

    protected function getUserOrExit($token){
        $user = User::findByPasswordReset($token);
        
        if($user){
            return $user;

        } else {
            View::renderTemplate('Password/token_expired.html');
            exit;
        } 
    }

}

?>