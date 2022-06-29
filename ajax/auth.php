<?php

$email = $_POST['email'];
$pass = $_POST['pass'];

require_once('../db.php');

$error = '';

if (empty($email)|| strlen($email)<4){
  $error =  'Введите корректно email';
}
else if (empty($pass)|| strlen($pass)<5){
  $error = 'Введите корректно пароль';
}

if ($error !=''){
  echo $error;
  exit();
}

$hash = 'fhfhfjfhjhff';
$pass = md5($pass.$hash);


$sql = 'SELECT `id` FROM `organization` WHERE `email`=:email && `pass`=:pass';
$query = $pdo->prepare($sql);
$query->execute(['email'=>$email,'pass'=>$pass]);

$user = $query->fetch(PDO::FETCH_OBJ);

if($user->id==0){
  echo 'Такого пользователя не существует';
} else {
  setcookie('login',$email,time()+3600*24,'/');
  echo 'Success';
}



 ?>
