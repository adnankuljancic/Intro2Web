<?php
$servername = "localhost";
$username = "root";
$password = "password";
$schema = "todos";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  $stmt = $conn->prepare("INSERT INTO todos(description, created) VALUES ('AdiTest','2022.04.14 22:29:00')");
  $result = $stmt -> execute();
  //$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
  print_r($result);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

 ?>
