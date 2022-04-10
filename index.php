<?php
require 'vendor/autoload.php'; //run autoloader

Flight::route('/', function(){ //define route and define function to handle request
$servername = "Intro2Web";
$username = "root";
$password = "";
$schema = "todos";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$schema", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
});

Flight::start();        //start FlightPHP
 ?>
