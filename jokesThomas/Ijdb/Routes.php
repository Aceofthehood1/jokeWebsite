<?php 
namespace Ijdb;
class routes implements \CSY2028\Routes {
    public function getController($name){
        require '../database.php';

        $jokesTable = new \CSY2028\DatabaseTable($pdo, 'joke', 'id');
        $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'category', 'id');
        $authorsTable = new \CSY2028\DatabaseTable($pdo, 'author', 'id');
    
        $controllers = []; 
        $controllers['joke'] = new \Ijdb\Controllers\Joke($jokesTable);
        $controllers['category'] =  new \Ijdb\Controllers\Category($categoriesTable);
        $controllers['author'] =  new \Ijdb\Controllers\Author($authorsTable);
    
        return $controllers[$name];
    }
    public function getDefaultRoute() {
        return 'joke/home';
    }

    public function checkLogin($route){
        session_start();
        $loginRoutes = [];
        $loginRoutes['/joke/edit'] =true;
        $loginRoutes['/category/edit'] =true; 
        
        $requiresLogin= $loginRoutes[$route] ?? false;

        if($requiresLogin && !isset($_SESSION['loggedin'])){
            header('location:/author/login');
            exit();
        }
    }
}