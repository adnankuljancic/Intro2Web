<?php
$id = $_REQUEST['id'];
$description = $_REQUEST['description'];
$created = $_REQUEST['created'];
require_once("rest/dao/TodoDao.class.php");
$dao = new TodoDao();
$dao -> update($id, $description, $created);
echo "DELETED UPDATED";
 ?>
