<?php

require_once('./config/common.php');
require_once('./config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $params = file_get_contents('php://input');
    $params = json_decode($params);
    // isset($_POST[''])
    $account = isset($params) && isset($params->account) ? $params->account : '';
    $password = isset($params) && isset($params->password) ? $params->password : '';

    $results = query("select * from user where account = '$account' and password = '$password'");
    $user = array('status' => 0);
    if (sizeof($results) > 0) {
        $user = $results[0];
        $_SESSION['uid'] = $user['id'];
        unset($user['password']);
        $user = array('status' => 1, 'user' => toHumpObj($user) );
    }

    echo json_encode($user);

}

?>
