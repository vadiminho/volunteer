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
 ?>

<div class="container">


<form class="" action="" method="post">
  <div class="form-group">
    <label for="">Введіть назву вашої організації</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="" placeholder="Enter name">
    <small id="" class="form-text text-muted">All confidence</small>
  </div>

 <div class="form-group mt-3">
   <label for="">Email</label>
   <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
 </div>

 <div class="form-group mt-3">
   <label for="">Місто</label>
   <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city">
 </div>

 <div class="form-group mt-3">
   <label for="">Адреса</label>
   <input type="text" class="form-control" id="adress" name="adress" placeholder="Enter adress">
 </div>


 <div class="form-group mt-3">
   <label for="">Телефон</label>
   <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter telephone">
 </div>

 <div class="form-group mt-3">
   <label for="">Код ЄДРПОУ</label>
   <input type="text" class="form-control" id="code" name='code' placeholder="Enter ЄДРПОУ">
 </div>


 <div class="form-group mt-3">
   <label for="">Пароль</label>
   <input type="password" class="form-control" id="pass" name='pass' placeholder="Enter password">
 </div>
 <div class="alert alert-success form-control" id="error">
 </div>
 <button type="button" id='reg' class="btn btn-outline-success mt-2">Registration</button>
</div>
</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$('#reg').click(function(){

  var name = $('#name').val();
  var email = $('#email').val();
  var city = $('#city').val();
  var adress = $('#adress').val();
  var telephone = $('#telephone').val();
  var code = $('#code').val();
  var pass = $('#pass').val();

  $.ajax({
    url:'../ajax/registration.php',
    type:'POST',
    cache:false,
    data:{'name':name, 'email':email,'city':city, 'adress':adress, 'telephone':telephone, 'code':code, 'pass':pass},
    dataType:'html',
    success:function(data){
      if(data=='Success'){
        $('#reg').text('Готово');
        $('#error').hide();
      } else {
        $('#reg').text('Неудача');
        $('#error').text(data);
        $('#error').show();
      }
    }
  });

});


</script>


  </body>
</html>
