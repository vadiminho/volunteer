<?php
setcookie('login',$name,time()-3600*24,'/');
unset($_COOKIE['login']);

 ?>
