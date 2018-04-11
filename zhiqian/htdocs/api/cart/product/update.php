<?php

require_once('../config/common.php');
require_once('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $id = isset($_POST['id']) ? $_POST['id'] : '';

  if ($id != '') {
    $updateText = '';

    foreach ($_POST as $key => $value) {
      if ($key != 'id') {
        if ($key == 'lock') {
          $updateText .= "`" . humpToLine($key) . "`='" . $value . "',";
        } else {
          $updateText .= humpToLine($key) . "='" . $value . "',";
        }
      }
    }

    $updateText = substr($updateText, 0, strlen($updateText) - 1);

    if (isset($_FILES["file"]) && $_FILES["file"]["error"] <= 0){
      $path = "/upload/" . time() . $_FILES["file"]["name"];
      // move_uploaded_file($_FILES["file"]["tmp_name"], '../'.$path);
      move_uploaded_file($_FILES["file"]["tmp_name"], iconv("UTF-8","gb2312",'../'.$path) );

      $updateText .= ",`img`='" . $path . "'";

    }

    $sql = "update product set $updateText where id in ( $id )";
    $results = query($sql);
    
    if ($results) {
      echo json_encode(array('status' => 1));
      exit;
    }
  }
  echo json_encode(array('status' => 0));

}else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {


  $params = file_get_contents('php://input');
  $params = json_decode($params);
  $id = isset($params) && isset($params->id) ? $params->id : '';
  if ($id != '') {
    $updateText = '';
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

    $sql = "update product set $updateText where id in ( $id )";
    $results = query($sql);
    
    if ($results) {
      echo json_encode(array('status' => 1));
      exit;
    }
  }
  echo json_encode(array('status' => 0));

}