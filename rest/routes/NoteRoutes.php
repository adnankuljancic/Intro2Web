<?php
//CRUD operations for notes

/*
** List all notes
*/
Flight::route('GET /notes', function(){
  Flight::json(Flight::noteService()->get_all());
});
/*
** List individual note
*/
Flight::route('GET /notes/@id', function($id){
  Flight::json(Flight::noteService() -> get_by_id($id));
});

/*
** Add note
*/
Flight::route('POST /notes', function(){
  Flight::json(Flight::noteService()->add(Flight::request()->data->getData()));
});
/*
** Update note
*/
Flight::route('PUT /notes/@id', function($id){
   $data = Flight::request() -> data -> getData();
   //$data['id'] = $id;
   Flight::json(Flight::noteService() -> update($id,$data));
});
/*
** Delete all notes
*/
Flight::route('DELETE /notes/@id', function($id){
  Flight::noteService() -> delete($id);
  Flight::json(["message"=>"deleted"]);
});

 ?>
