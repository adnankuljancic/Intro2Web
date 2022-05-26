<?php
//CRUD operations for todos

/*
** List all todos
*/
Flight::route('GET /todos', function(){
  Flight::json(Flight::todoService()->get_all());
});
/*
** List individual todo
*/
Flight::route('GET /todos/@id', function($id){
  Flight::json(Flight::todoService() -> get_by_id($id));
});

/*
** Add todo
*/
Flight::route('POST /todos', function(){
  Flight::json(Flight::todoService()->add(Flight::request()->data->getData()));
});
/*
** Update todo
*/
Flight::route('PUT /todos/@id', function($id){
   $data = Flight::request() -> data -> getData();
   //$data['id'] = $id;
   Flight::json(Flight::todoService() -> update($id,$data));
});
/*
** Delete all todos
*/
Flight::route('DELETE /todos/@id', function($id){
  Flight::todoService() -> delete($id);
  Flight::json(["message"=>"deleted"]);
});


 ?>
