<?php

$dbName = "cart";
$serverName = "localhost";
$dsn = "mysql:dbname=$dbName;host=$serverName";
$dbUser = 'root';
$dbPass = '';

try {
//  禁止ATTR_EMULATE_PREPARES本地模拟prepare，解决数据库返回数据自动把整数转换字符串的问题
  $pdo = new PDO($dsn, $dbUser, $dbPass, array(PDO::ATTR_EMULATE_PREPARES=>FALSE));
  $pdo->query('set names utf8;');
} catch (PDOException $e) {
  echo '数据库连接失败' . $e->getMessage();
  exit;
}

function query($sql = '')
{
  $pdo = $GLOBALS['pdo'];
  if (explode(' ', $sql)[0] === 'select') {
    $query = $pdo->query($sql);
    if ($query) {
      return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
      return false;
    }
  }else if(explode(' ', $sql)[0] === 'insert'){
    $pdo->exec($sql);
    return $pdo->lastInsertId(); 
  } else {
    return $pdo->exec($sql);
  }


}
