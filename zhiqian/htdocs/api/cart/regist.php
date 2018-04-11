<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = isset($_POST['email']) ? $_POST['email'] : null;
  $nickName = isset($_POST['nickName']) ? $_POST['nickName'] : null;
  $password = isset($_POST['password']) ? $_POST['password'] : null;
  $mobile = isset($_POST['mobile']) ? $_POST['mobile'] : null;

  $id = uniqid();
  $results = query("insert into user(id, email, nick_name, password, mobile) values('$id', '$email', '$nickName', '$password', '$mobile')");

  if ($results) {
    $sid = uniqid();
    $results = query("insert into setting(id, uid) values('$sid', '$id')");
    $_SESSION['uid'] = $id;
    $setting = selectSettingByUid( $id );
    echo json_encode( array('status' => 1, 'user' => array('id' => $id, 'email' => $email, 'nickName' => $nickName, 'mobile' => $mobile, 'cacheRoute' => '/'), 'setting' => toHumpObj($setting) ) );
  } else {
    echo json_encode(array('status' => 0));
  }


}

?>
