<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $uid = isset( $_SESSION['uid'] ) ? $_SESSION['uid'] : '';
  $p = isset($_GET['p']) ? $_GET['p'] : '';
  $pnum = isset($_GET['pnum']) ? $_GET['pnum'] : 2;
  if($p == ''){
    $sql = 'select * from `order` order by create_time desc';
  }else{
    if($uid == 1){
      $sqlCount = 'select count(1) from `order`';
      $sqlText = "select * from `order`";
    }else{
      $sqlCount = 'select count(1) from `order` where uid = $uid';
      $sqlText = "select * from `order` where uid = $uid";
    }
    $count = $pdo->query( $sqlCount )->fetchAll(PDO::FETCH_ASSOC)[0]['count(1)'];
    $total = ceil($count/$pnum);
    $start = ($p - 1)*$pnum ;
    $end = $p*$pnum < $count ? $p*$pnum : $count;
    $sql = "$sqlText limit $start,$end order by create_time desc";
  }
  $results = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  
  if ($results) {
    $orders = array();
    foreach ($results as $k => $v) {
      $prods = array();
      $pidsArr = array();
      $numsArr = array();
      foreach ($v as $key => $value) {
        if($key == 'pids'){
          $pidsArr = explode(',', $value);
          for( $i = 0; $i < sizeof($pidsArr); $i++ ){
            array_push($prods, $pdo->query( "select * from product where id = $pidsArr[$i]" )->fetchAll(PDO::FETCH_ASSOC)[0] );
          }
          
        }else if($key == 'nums'){
          $numsArr = explode(',', $value);
        }
      }

      for( $i = 0; $i < sizeof($prods); $i++ ){
        $prods[$i]['cnum'] = $numsArr[$i];
      }
      $v['prods'] = $prods;
      array_push($orders, $v);
    }
    echo json_encode( array('status'=>1, 'list'=>toHumpObj($orders) ) );
  } else {
    echo json_encode( array('status'=>0) );
  }
//  $query = $pdo->query("select c.id as cid, pid, c.num as cnum, p.name as pname, price, img from cart as c JOIN product as p where pid = p.id and p.lock = 0 AND uid = $uid");
//  if ($query) {
//    echo json_encode( array( 'status'=>1, 'list'=>$query->fetchAll(PDO::FETCH_ASSOC) ) );
//  } else {
//    echo json_encode( array( 'status'=>0 ) );
//  }

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $params = file_get_contents('php://input');
  $params = json_decode($params);

  $pids = isset($params->pids) ? $params->pids : '';
  $nums = isset($params->nums) ? $params->nums : '';
  $uid = isset( $_SESSION['uid'] ) ? $_SESSION['uid'] : '';

  if ($pids != '' && $nums != '' && $uid != '') {
    $prods = query("select * from product where id in ($pids)");
    $total = 0;
    $pidsArr = explode(',', $pids);
    $numsArr = explode(',', $nums);
    for ($i = 0;$i<sizeof($pidsArr);$i++){
      for ($j = 0;$j<sizeof($prods);$j++){
        if($prods[$j]['id'] == $pidsArr[$i]){
          $total += $prods[$j]['price'] * $numsArr[$i];
          break;
        }

      }
    }

    $time = time();
    $sql = "insert into `order`(pids, nums, uid, create_time, total) values('$pids', '$nums', $uid,$time, $total)";
    $results = query($sql);

    if ($results) {
      $params->id = $results;
      $delcart = query("delete from cart where pid in ( $pids ) and uid = $uid");
      echo json_encode(array('status' => 1, 'order' => $params));
      exit;
    }
  }
  echo json_encode(array('status' => 0));

} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

  $params = file_get_contents('php://input');
  $params = json_decode($params);

  $id = isset($params->id) ? $params->id : '';
  $status = isset($params->status) ? $params->status : '';

  if ($id !== '') {
    $sql = "update `order` set `status` = $status where id = $id";
    $results = query($sql);
    if ($results) {
      echo json_encode(array('status' => 1));
      exit;
    }
  }
  echo json_encode(array('status' => 0));

}