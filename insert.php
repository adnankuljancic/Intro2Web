<?php
$description = $_REQUEST['description'];
$created = $_REQUEST['created'];
require_once("rest/dao/TodoDao.class.php");
$dao = new TodoDao();
$result = $dao -> add($description, $created);
print_r($result);

 ?>
