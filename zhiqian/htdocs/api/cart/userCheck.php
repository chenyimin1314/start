<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  if( isset($_SESSION['uid']) ){
    $uid = $_SESSION['uid'];
    $results = query("select id, account from user where id = '$uid'");
    echo json_encode( array('status' => 1, 'user' => toHumpObj($results[0]) ) );
  }else{
    echo json_encode( array('status' => 0 ) );
  }

} 

?>
