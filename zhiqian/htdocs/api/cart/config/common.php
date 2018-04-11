<?php

require_once('config.php');

// Check whether session started using Predefined Constants
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// $_SESSION['uid'] = 1;

$_PUT = array();
$_DELETE = array();
if ('PUT' == $_SERVER['REQUEST_METHOD']) {
  parse_str(file_get_contents('php://input'), $_PUT);
}
if ('DELETE' == $_SERVER['REQUEST_METHOD']) {
  parse_str(file_get_contents('php://input'), $_DELETE);
}

if(!isset($_SESSION['uid']) && !( strstr($_SERVER['PHP_SELF'], 'login.php') || strstr($_SERVER['PHP_SELF'], 'regist.php') || strstr($_SERVER['PHP_SELF'], 'logout.php') ) ){
  echo json_encode( array('status'=>1001, 'msg'=>'请登录') );
  exit;
}


function toHumpObj($obj){
  $newObj = array();
  foreach ($obj as $key => $value) {
    if(gettype($value) == 'array'){
      $newObj[ lineToHump($key) ] = toHumpObj($value);
    }else{
      $newObj[ lineToHump($key) ] = $value;
    }
  }
  return $newObj;
}

function toLineObj($obj){
  $newObj = array();
  foreach ($obj as $key => $value) {
    if(gettype($value) == 'array'){
      $newObj[ humpToLine($key) ] = toLineObj($value);
    }else{
      $newObj[ humpToLine($key) ] = $value;
    }
  }
  return $newObj;
}

/*
 * 下划线转驼峰
 */
function lineToHump($str)
{
    $str = preg_replace_callback('/([-_]+([a-z]{1}))/i',function($matches){
        return strtoupper($matches[2]);
    },$str);
    return $str;
}

/*
 * 驼峰转下划线
 */
function humpToLine($str){
    $str = preg_replace_callback('/([A-Z]{1})/',function($matches){
        return '_'.strtolower($matches[0]);
    },$str);
    return $str;
}

function boolToInt($str){
  if( is_bool($str) ){
    if($str){
      return 1;
    }else{
      return 0;
    }
  }else{
    if( $str == 'true' ){
      return 1;
    }else if( $str == 'false' ){
      return 0;
    }else{
      return $str;
    }
  }

}