<?php
class TodoDao{
  private $conn;
  //constructor
  public function __construct() {
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $schema = "todos";


    $this->conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this->conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }
  //method used to read all todo objects from database
  public function get_all() {
    $stmt = $this->conn->prepare("SELECT * FROM todos");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  //method used to read all todo objects from database
  public function get_by_id($id) {
    $stmt = $this -> conn->prepare("SELECT * FROM todos WHERE id=:id");
    $stmt -> execute(['id'=>$id]);
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    return @reset($result);
  }
  //add todo to database
  public function add($todo) {
    $stmt = $this -> conn->prepare("INSERT INTO todos(description, created) VALUES (:description, :created)");
    $stmt -> execute($todo);
    $todo['id'] = $this -> conn -> lastInsertId();
    return $todo;
  }
  //delete todo from database
  public function delete($id){
    $stmt = $this -> conn->prepare("DELETE FROM todos WHERE id=:id");
    $stmt -> bindParam(':id', $id); //SQL injection prevention
    $stmt -> execute();
  }
  //update todo in database
  public function update($todo) {
    $stmt = $this -> conn->prepare("UPDATE todos SET description=:description, created=:created WHERE id=:id");
    $stmt -> execute($todo);
    return $todo;
  }


}



 ?>
