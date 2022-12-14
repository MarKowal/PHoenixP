<?php
namespace App\Controllers;

use \Core\View;
use \App\Auth;
use \App\Mail;

class Home extends \Core\Controller {
    protected function before(){
        //echo "(before)<br>";
        //return false;
        /*przykład że before() przydaje się do spr czy user jest zalogowany:
            if ( ! isset($_SESSION["user_id"])) {
                return false;
            }*/
    }

    protected function after(){
        //echo "<br>(after)";
    }

    public function indexAction(){
        //echo "Hello from the index action in the Home controller.";
        /*View::render('Home/index.php', [ 
            'name' => 'Dave',
            'colours' => ['red', 'green', 'blue']]
        );*/

        //Mail::send('mr_kowalski@interia.pl', 'Wiadomość numer 3', 'Email <b>wysłany!</b> ą ę ć ś ź ż ł ń');
        //$mail = new Mail;
        //$mail->send();


        View::renderTemplate('Home/index.html', 
            /*[
                'name' => 'Dave',
                'colours' => ['red', 'green', 'blue', 'yellow']
            ]*/
            //['user' => Auth::getUser()]    
        );
    }
}

?>