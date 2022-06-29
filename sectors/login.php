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


 ?>

<div class="container">
  <form class="" action="" method="post">
    <?php
if ($_COOKIE['login']==''):
 ?>
    <div class="form-group">
      <label for="">Email address</label>
      <input type="email"  class="form-control" name='email' id='email' aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name='pass' id='pass' class="form-control" placeholder="Password">
    </div>
    <div class="alert alert-success form-control mt-3" id="error"></div>
    <button type="button" name='auth' id='auth' class="btn btn-outline-success mt-2">Submit</button>
    <?php
else:

    $name = $_COOKIE['login'];
    $sql = 'SELECT * FROM organization WHERE `email`=?';
    $query = $pdo->prepare($sql);
    $query->execute([$name]);
    $users = $query->fetchAll(PDO::FETCH_OBJ);

    foreach ($users as $el) {

    }
 ?>

 <form>
   <div class="form-row">
     <div class="form-group col-md-6">
       <label for="">Name</label>
       <input type="text" class="form-control"  value ='<?= $el->name ?>'>
     </div>
   </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">Email</label>
      <input type="email" class="form-control" value = '<?= $el->email ?>'>
    </div>
  </div>
  <div class="form-group col-md-6">
    <label for="">Address</label>
    <input type="text" class="form-control" value = '<?= $el->adress ?>'>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="">City</label>
      <input type="text" class="form-control" value = '<?= $el->city ?>'>
    </div>
    <div class="form-group col-md-6">
      <label for="">Telephone</label>
      <input type="text" class="form-control" value = '<?= $el->telephone ?>'>
    </div>
    <div class="form-group col-md-6">
      <label for="">ЄДПРОУ</label>
      <input type="text" class="form-control" value = '<?= $el->code ?>'>
    </div>
  </div>
  <div class="form-group mt-3">
  </div>
</form>
 <button type="button" name="exit" id="exit" class= 'btn btn-success form-control mt-3'>Выход</button>

 <?php
endif;
  ?>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

$('#exit').click(function(){


  $.ajax({
    url:'../ajax/exit.php',
    type:'POST',
    cache:false,
    data:{},
    dataType:'html',
    success:function(data){
      document.location.reload(true);
    }
  });

});

$('#auth').click(function(){

  var email = $('#email').val();

  var pass = $('#pass').val();

  $.ajax({
    url:'../ajax/auth.php',
    type:'POST',
    cache:false,
    data:{'email':email, 'pass':pass},
    dataType:'html',
    success:function(data){
      if(data=='Success'){
        $('#auth').text('Готово');
        $('#error').hide();
        document.location.reload(true);
      } else {
        $('#auth').text('Неудача');
        $('#error').text(data);
        $('#error').show();
      }
    }
  });

});

</script>

  </body>
</html>
