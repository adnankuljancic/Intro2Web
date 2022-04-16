<?php
$id = $_REQUEST['id'];
require_once("rest/dao/TodoDao.class.php");
$dao = new TodoDao();
$dao -> delete($id);
echo "DELETED $id";
 ?>
