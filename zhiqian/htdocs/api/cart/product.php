<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $params = file_get_contents('php://input');
  $params = json_decode($params);
  if($params == null){
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $p = isset($_GET['p']) ? $_GET['p'] : '';
    $pnum = isset($_GET['pnum']) ? $_GET['pnum'] : 2;
  }else{
    $id = isset($params) && isset($params->id) ? $params->id : '';
    $p = isset($params) && isset($params->p) ? $params->p : '';
    $pnum = isset($params) && isset($params->pnum) ? $params->pnum : '';
  }

  // $id = isset($_GET['id']) ? $_GET['id'] : '';
  // $p = isset($_GET['p']) ? $_GET['p'] : '';
  // $pnum = isset($_GET['pnum']) ? $_GET['pnum'] : 2;

  if ($id === '') {
    if ($p === '') {
      $sql = 'select * from product where `lock` = 0 and del = 0 order by create_time desc';
      $total = 1;
    } else {
      $count = $pdo->query('select count(1) from product where `lock` = 0 and del = 0')->fetchAll(PDO::FETCH_ASSOC)[0]['count(1)'];
      $total = ceil($count / $pnum);
      $start = ($p - 1) * $pnum;
      $sql = "select * from product where `lock` = 0 and del = 0 order by create_time desc limit $start,$pnum";
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

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $name = isset($_POST['name']) ? $_POST['name'] : '';

  if ($name != '') {
    $insertKeyText = '';
    $insertText = '';
    foreach ($_POST as $key => $val) {
      if ($key == 'lock' || $key == 'price') {
        $insertKeyText .= ",`" . humpToLine($key) . '`';
        $insertText .= "," . $val;
      } else {
        $insertKeyText .= "," . humpToLine($key);
        $insertText .= ",'" . $val . "'";
      }
    }

    if ( isset($_FILES["file"]) && $_FILES["file"]["error"] <= 0){
      $path = "upload/" . time() . $_FILES["file"]["name"];
      // move_uploaded_file($_FILES["file"]["tmp_name"], $path);
      move_uploaded_file($_FILES["file"]["tmp_name"], iconv("UTF-8","gb2312",$path) );

      $insertKeyText .= ",img";
      $insertText .= ",'/" . $path . "'";

    }

    $sql = "insert into product(create_time $insertKeyText) values(" . time() . " $insertText)";
    $results = query($sql);

    if ($results) {
      $_POST['id'] = $results;
      echo json_encode(array('status' => 1, 'product' => toHumpObj($_POST)));
      exit;
    }

  }

  echo json_encode(array('status' => 0));


} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {

  $params = file_get_contents('php://input');
  $params = json_decode($params);
  if($params == null){
    $id = isset($_PUT['id']) && isset($_PUT['id']) ? $_PUT['id'] : '';
  }else{
    $id = isset($params) && isset($params->id) ? $params->id : '';
  }
  if ($id != '') {
    $updateText = '';
    if($params == null){
      $params = $_PUT;
    }
    foreach ($params as $key => $value) {
      if ($key != 'id') {
        if ($key == 'lock') {
          $updateText .= "`" . humpToLine($key) . "`='" . $value . "',";
        } else {
          $updateText .= humpToLine($key) . "='" . $value . "',";
        }
      }
    }
    $updateText = substr($updateText, 0, strlen($updateText) - 1);
    $results = query("update product set $updateText where id in ( $id )");
    if ($results) {
      echo json_encode(array('status' => 1));
      exit;
    }
  }
  echo json_encode(array('status' => 0));

} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {

  $params = file_get_contents('php://input');
  $params = json_decode($params);
  if($params == null){
    $id = isset($_DELETE['id']) && isset($_DELETE['id']) ? $_DELETE['id'] : '';
  }else{
    $id = isset($params) && isset($params->id) ? $params->id : '';
  }

  if ($id != '') {
    $results = query("update product set del = 1 where id in ( $id )");
    $results2 = query("delete from cart where pid in ( $id )");
    if ($results) {
      echo json_encode(array('status' => 1));
      exit;
    }
  }
  echo json_encode(array('status' => 0));

}