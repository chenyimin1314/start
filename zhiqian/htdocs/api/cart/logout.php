<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  
  unset($_SESSION['uid']);
  echo json_encode( array('status' => 1) );

}

?>
