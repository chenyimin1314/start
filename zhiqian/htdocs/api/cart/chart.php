<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $uid = isset( $_SESSION['uid'] ) ? $_SESSION['uid'] : '';
  $status = isset($_GET['status']) ? $_GET['status'] : '';

  if($uid != '' && $status != ''){
    $sql = "select * from `order` where `status` = $status order by create_time desc";
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
      exit;
    }

  }

  echo json_encode( array('status'=>0) );


}