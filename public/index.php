<?php
//*** FRONT CONTROLLER ***

//echo 'Requested URL = '.$_SERVER['QUERY_STRING']."<br>";

//require '../App/Controllers/Posts.php';
//require '../Core/Router.php';

//Twig:
require_once dirname(__DIR__).'/vendor/autoload.php';
//Twig_Autoloader::register();

/*
//Autoloader:
spl_autoload_register(function($class){
    $root = dirname(__DIR__); //get the parent directory
    $file = $root.'/'.str_replace('\\', '/', $class).'.php';
    if (is_readable($file)){
        require $root.'/'.str_replace('\\', '/', $class).'.php';
    }

});
*/

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


$router = new Core\Router();

//echo get_class($router);

$router->add('', ['controller'=>'Home', 'action'=>'index']);
//$router->add('posts', ['controller'=>'Posts', 'action'=>'index']);
//$router->add('posts/new', ['controller'=>'Posts', 'action'=>'new']);
//$router->add('blog', ['controller'=>'Blog', 'action'=>'index']);
//$router->add('products/list', ['controller'=>'Products', 'action'=>'list']);
$router->add('login', ['controller' => 'Login', 'action' => 'new']);
$router->add('{controller}/{action}');
//$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

//pokazuje routing table:
/*echo '<pre>';
echo var_dump($router->getRoutes());
echo '</pre>';*/

//Match the requested route:
/*$url = $_SERVER['QUERY_STRING'];
if ($router->match($url)){
    echo '<pre>';
    echo var_dump($router->getParams());
    echo '</pre>';
} else {
    echo 'No route found for URL: '.$url;
}*/

$router->dispatch($_SERVER['QUERY_STRING']);

//phpinfo();

?>