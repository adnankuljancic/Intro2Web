<?php

require_once("rest/dao/TodoDao.class.php");
$dao = new TodoDao();
$result = $dao -> get_all();
print_r($result);

 ?>
