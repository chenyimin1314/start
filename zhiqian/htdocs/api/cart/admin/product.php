<?php

require_once('../config/common.php');
require_once('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $p = isset($_GET['p']) ? $_GET['p'] : '';
  $pnum = isset($_GET['pnum']) ? $_GET['pnum'] : 2;

  if ($id === '') {
    if ($p === '') {
      $sql = 'select * from product where del = 0 order by create_time desc';
      $total = 1;
    } else {
      $count = $pdo->query('select count(1) from product where del = 0')->fetchAll(PDO::FETCH_ASSOC)[0]['count(1)'];
      $total = ceil($count / $pnum);
      $start = ($p - 1) * $pnum;
      $sql = "select * from product where del = 0 order by create_time desc limit $start,$pnum";
    }
    $query = $pdo->query($sql);
    if ($query) {
      $list = $query->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode(array('status' => 1, 'list' => toHumpObj($list), 'total' => $total));
    } else {
      echo json_encode(array('status' => 0));
    }
  } else {
    $sql = "select * from product where id = $id";
    $query = $pdo->query($sql);
    if ($query) {
      $product = $query->fetchAll(PDO::FETCH_ASSOC);
      if( sizeof($product) > 0 ){
        echo json_encode( array( 'status' => 1, 'product' => toHumpObj($product[0]) ) );
      }else{
        echo json_encode(array('status' => 0));
      }
      
    } else {
      echo json_encode(array('status' => 0));
    }
  }

} 