<?php

$name = $_POST['name'];
$email = $_POST['email'];
$city = $_POST['city'];
$adress = $_POST['adress'];
$telephone = $_POST['telephone'];
$code = $_POST['code'];
$pass = $_POST['pass'];


require_once('../db.php');

$error = '';
$real = '';

if (empty($name) || strlen($name)<3){
  $error = 'Введіть корректно name';
}
else if (empty($email) || strlen($email)<3){
  $error = 'Введіть корректно email';
}
else if (empty($city) || strlen($city)<3){
  $error = 'Введіть корректно city';
}
else if (empty($adress) || strlen($adress)<3){
  $error = 'Введите корректно adress';
}
else if (empty($telephone) || strlen($telephone)<3){
  $error = 'Введіть корректно telephone';
}
else if (empty($code) || strlen($code)<3){
  $error = 'Введіть корректно code';
}
else if (empty($pass) || strlen($pass)<3){
  $error = 'Введіть корректно pass';
}

if ($error !=''){
  echo $error;
  exit();
}

$hash = 'fhfhfjfhjhff';
$pass = md5($pass.$hash);

$sqlone = 'SELECT count(*) FROM `organization` WHERE `name`=:name';
$select_login = $pdo->prepare($sqlone);
$select_login->execute(['name'=>$name]);
$exist_login = $select_login->fetchColumn();


$sqltwo = 'SELECT count(*) FROM `organization` WHERE `email`=:email';
$select_email = $pdo->prepare($sqltwo);
$select_email->execute(['email'=>$email]);
$exist_email = $select_email->fetchColumn();

if($exist_login){
  $real = 'Користувач з таким name вже існує';
}
else if ($exist_email){
  $real = 'Користувач з таким email вже існує';
}

if($real !=''){
  echo $real;
  exit();
}

$sql = 'INSERT INTO organization(name,email,city,adress,telephone,code,pass) VALUES(?,?,?,?,?,?,?)';
$query = $pdo->prepare($sql);
$query->execute([$name,$email,$city,$adress,$telephone,$code,$pass]);


echo 'Success';

 ?>
 
