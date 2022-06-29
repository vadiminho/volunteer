<?php

$host = 'vadimiho.zzz.com.ua';
$user = 'vadiminho';
$password = 'QwertyAps1234';
$db = 'vadiminho@vadimiho.zzz.com.ua';

try {
  $dsn = 'mysql:host='.$host.';dbname='.$db;
  $pdo = new PDO($dsn,$user,$password);

} catch (PDOException $e) {
    print $e->getMessage ();
}

 ?>
