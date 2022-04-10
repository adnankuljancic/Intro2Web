<?php
require 'vendor/autoload.php'; //run autoloader

Flight::route('/', function(){ //define route and define function to handle request
  echo 'Hello Adi!';
});

Flight::start();        //start FlightPHP
 ?>
