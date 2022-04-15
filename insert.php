<?php
$description = $_REQUEST['description'];
require_once("rest/dao/TodoDao.class.php");
$dao = new TodoDao();
$result = $dao -> add($description);
print_r($result);

 ?>
