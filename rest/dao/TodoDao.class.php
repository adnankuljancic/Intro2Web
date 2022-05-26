<?php
require_once __DIR__.'/BaseDao.class.php';
class TodoDao extends BaseDao{
  //constructor
  public function __construct() {
    parent::__construct("todos");
  }




}



 ?>
