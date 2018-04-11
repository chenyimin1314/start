<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $uid = isset( $_GET['id'] ) ? $_GET['id'] : null;

  if( $uid ){
    $results = query("select id, account from user where id = '$uid'");
  }else{
    $results = query("select id, account from user");
  }
  
  echo json_encode($results);

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  


}

?>
