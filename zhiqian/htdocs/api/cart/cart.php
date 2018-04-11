<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $uid = isset( $_SESSION['uid'] ) ? $_SESSION['uid'] : '';

  $query = $pdo->query("select cid, pid, cnum, name, price, `check`, img from cart as c JOIN product as p where pid = p.id and p.lock = 0 AND uid = $uid");
  
  if ($query) {
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode( array( 'status'=>1, 'list'=>$results ) );
  } else {
    echo json_encode( array( 'status'=>0 ) );
  }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $params = file_get_contents('php://input');
  $params = json_decode($params);
  $pid = isset($params) && isset($params->pid) ? $params->pid : '';
  $uid = isset( $_SESSION['uid'] ) ? $_SESSION['uid'] : '';

  if ($pid !== '') {

    $rs = $pdo->query("select * from cart where pid = $pid")->fetchAll(PDO::FETCH_ASSOC);
    
    if( sizeof($rs) > 0){
      $cnum = $rs[0]['cnum'] + 1;
      $results = query("update cart set cnum = $cnum where pid = $pid and uid = $uid");
      if ($results) {
        $params->cnum = $cnum;
        echo json_encode(array('status' => 1, 'cartItem' => $params));
        exit;
      }
    }else{
      $sql = "insert into cart(pid, cnum, uid) values($pid, 1, $uid)";
      $results = query($sql);

    if ($results) {
      $params->cid = $results;
      $params->cnum = 1;
        echo json_encode(array( 'status' => 1, 'cartItem' => $params ));
        exit;
      }
    }

    
  }
  echo json_encode(array('status' => 0));

} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  $params = file_get_contents('php://input');
  $params = json_decode($params);

  $pid = isset($params->pid) ? $params->pid : '';
  $check = isset($params->check) ? $params->check : '';
  $cnum = isset($params->cnum) ? $params->cnum : '';
  $uid = isset( $_SESSION['uid'] ) ? $_SESSION['uid'] : '';

  if ($pid !== '' && $uid !== '') {
    $updateText = '';
    if($cnum !== '' && $cnum > 0){
      $updateText .= "`cnum` = $cnum";
    }
    if($check !== ''){
      $updateText .= "`check` = $check";
    }
    $sql = "update cart set $updateText where pid in ( $pid ) and uid = $uid";
    $results = query($sql);
    if ($results) {
      echo json_encode(array('status' => 1, 'cartItem'=>$params));
      exit;
    }
  }
  echo json_encode(array('status' => 0));

} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

  $params = file_get_contents('php://input');
  $params = json_decode($params);

  $pid = isset($params->pid) ? $params->pid : '';
  $uid = isset( $_SESSION['uid'] ) ? $_SESSION['uid'] : '';

  if($pid !== '' && $uid !== ''){
    
    $results = query("delete from cart where pid in ( $pid ) and uid = $uid");
    if ($results) {
      echo json_encode(array('status' => 1));
      exit;
    }
  }
  echo json_encode(array('status' => 0));

}