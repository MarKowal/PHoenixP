<?php
namespace App\Controllers;

use \Core\View;
use \App\Auth;

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