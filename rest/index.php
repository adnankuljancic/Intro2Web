<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../vendor/autoload.php';
require_once("dao/TodoDao.class.php");
//CRUD operations for todos

/*
** List all todos
*/
Flight::route('/todos', function(){
  $dao = new TodoDao();
  $todos = $dao -> get_all();
  Flight::json($todos);
});
/*
** List individual todo
*/

/*
** Add todo
*/

/*
** Update todo
*/

/*
** Delete all todos
*/

Flight::start();

 ?>
