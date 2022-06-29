<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  </head>
  <body>
<?php
require_once '../blocks/header.php';
require_once '../db.php';

$sql = 'SELECT * FROM organization';
$query = $pdo->prepare($sql);
$query->execute([]);
$users = $query->fetchAll(PDO::FETCH_OBJ);

 ?>

<?php

echo '<section id="why-us" class="why-us">';
echo '<div class="container">';
echo '<div class="row no-gutters">';

foreach ($users as $el) {
  echo '<div class="col-lg-4 col-md-6 content-item">';
  echo "<span>".$el->id."</span>";
  echo "<h3>".$el->name."<h3>";
  echo "<h4>".$el->city."<h4>";
  echo "<h6>".'Адреса: '.$el->adress."</h6>";
  echo "<h6>".'Банківський рахунок: '.$el->code."</h6>";
  echo "<h6>".'Наша електрона пошта: '.$el->email."</h6>";
  echo '</div>';
}


echo '</div>';
echo '</div>';
echo '</section>';

 ?>
