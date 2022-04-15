<<?php
class TodoDao{
  private $conn;
  //constructor
  public function __construct() {
    $servername = "localhost";
    $username = "root";
    $password = "password";
    $schema = "todos";


    $this -> conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
    // set the PDO error mode to exception
    $this -> conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }
  //method used to read all todo objects from database
  public function get_all() {
    $stmt = $this -> conn->prepare("SELECT * FROM todos");
    $stmt -> execute();
    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
  }
  //add todo to database
  public function add($description) {
    $stmt = $this -> conn->prepare("INSERT INTO todos(description, created) VALUES ('$description','2022.04.14 22:29:00')");
    return $result = $stmt -> execute();


  }


}



 ?>
